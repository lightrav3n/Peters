<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\News;
use App\Models\NewsCategories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $activities = News::with('media')->orderBy('publish_date','desc')->get();
        $newsCategories = NewsCategories::orderBy('order', 'asc')->get();
        $languages = Language::query()->get();
        return \view('cms.news.index',compact('activities', 'newsCategories', 'languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $newsCategories = NewsCategories::orderBy('order', 'asc')->get();
        $languages = Language::query()->get();

        return view('cms.news.create',compact('newsCategories', 'languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request->title));
        $checkSlug = News::where('slug', $slug)->count();
        $verifiedSlug = '';
        $SixDigitRandomNumber = mt_rand(100000,999999);
        if ($checkSlug ? $verifiedSlug = $slug.'-'.$SixDigitRandomNumber : $verifiedSlug = $slug);

        $news = new News();
        $news->title = $request->title;
        $news->category_id = $request->category;
        $news->language = $request->language;
        $news->slug = $verifiedSlug;
        $news->poster_image_collection = 'poster';
        $news->short_description = $request->shortDescription;
        $news->description = $request->description;
        if ($request->galleryImages){
            $news->gallery_collection = 'gallery';
        }
        $news->embed_video = $request->embedVideo;
        if ($request->localVideo) {
            $news->local_video = 'localVideo';
        }
        $news->visibility = $request->visibility == 'on' ? '1' : '0';
        $news->publish_date = $request->publishDate;
        $news->save();

        $news->addMedia($request->posterImage)
            ->toMediaCollection('poster');

        if ($request->galleryImages){
            foreach ($request->galleryImages as $file){
                $news->addMedia($file)
                    ->toMediaCollection('gallery');
            }
        }
        if ($request->localVideo){
            $news->addMedia($request->localVideo)
                ->toMediaCollection('localVideo');
        }

        return redirect()->route('News.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $News): View
    {
        $newsCategories = NewsCategories::orderBy('order', 'asc')->get();
        $languages = Language::query()->get();

        return \view('cms.news.edit',compact('newsCategories', 'languages'))->with('activity', $News);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(News $News, Request $request): RedirectResponse
    {
        $News->category_id = $request->category;
        $News->language = $request->language;
        $News->title = $request->title;
        $News->slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request->title));
        $News->poster_image_collection = 'poster';
        $News->short_description = $request->shortDescription;
        $News->description = $request->description;
        if ($request->galleryImages){
            $News->gallery_collection = 'gallery';
        }
        $News->embed_video = $request->embedVideo;
        if ($request->localVideo) {
            $News->local_video = 'localVideo';
        }
        $News->visibility = $request->visibility == 'on' ? '1' : '0';
        $News->publish_date = $request->publishDate;
        $News->update();

        if ($request->posterImage){
            $News->addMedia($request->posterImage)
                ->toMediaCollection('poster');
        }
        if ($request->galleryImages){
            foreach ($request->galleryImages as $file){
                $News->addMedia($file)
                    ->toMediaCollection('gallery');
            }
        }
        if ($request->localVideo){
            $News->addMedia($request->localVideo)
                ->toMediaCollection('localVideo');
        }

        return redirect()->route('News.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $News)
    {
        $News->delete();
        return redirect()->back();
    }

    public function MediaOrder(Request $request){
        $i = 1;

        foreach ($request['item'] as $value) {
            // Execute statement:
            // UPDATE [Table] SET [Position] = $i WHERE [EntityId] = $value
            $media = Media::find($value);
            $media->order_column = $i;
            $media->save();
            $i++;
        }
    }

    public function deleteGalleryMedia(Request $request){
        $media = Media::find($request->mediaId)->delete();
    }

    public function CategoryAdd(Request $request){
        $order = NewsCategories::all()->count();
        $slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request['name']));

        $category = new NewsCategories();
        $category->title = $request['name'];
        $category->slug = $slug;
        $category->order = $order+1;
        $category->save();

        return redirect()->route('News.index');
    }
    public function CategoryOrder(Request $request){
        $i = 1;

        foreach ($request['item'] as $value) {
            // Execute statement:
            // UPDATE [Table] SET [Position] = $i WHERE [EntityId] = $value
            $category = NewsCategories::find($value);
            $category->order = $i;
            $category->save();
            $i++;
        }
    }

    public function deleteCategory(Request $request){
        $category = NewsCategories::find($request->categoryId)->delete();
    }

    public function duplicatePost(News $News): View
    {
        $newsCategories = NewsCategories::orderBy('order', 'asc')->get();
        $languages = Language::query()->get();

        return \view('cms.news.duplicate', compact('newsCategories', 'languages'))->with('activity', $News);
    }

    public function duplicatePostStore(Request $request, News $News){

        $slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request->title));
        $checkSlug = News::where('slug', $slug)->count();
        $verifiedSlug = '';
        $SixDigitRandomNumber = mt_rand(100000,999999);
        if ($checkSlug ? $verifiedSlug = $slug.'-'.$SixDigitRandomNumber : $verifiedSlug = $slug);

        $news = new News();
        $news->title = $request->title;
        $news->category_id = $request->category;
        $news->language = $request->language;
        $news->slug = $verifiedSlug;
        $news->poster_image_collection = 'poster';
        $news->short_description = $request->shortDescription;
        $news->description = $request->description;
        $news->embed_video = $request->embedVideo;
        $news->visibility = $request->visibility == 'on' ? '1' : '0';
        $news->publish_date = $request->publishDate;
        $news->save();

        $galleries = Media::query()->where('model_id', $News->id)->get();
        foreach ($galleries as $gallery){
            $media = Media::find($gallery->id);

            $newMedia = $media->replicate();
            $newMedia->model_id = $news->id;
            $newMedia->uuid = Str::uuid();
            $newMedia->created_at = Carbon::now();
            $newMedia->save();

            $source = 'storage/'.$gallery->id;
            $destination = 'storage/'.$newMedia->id;

            File::copyDirectory(public_path($source), public_path($destination));
        }

        return redirect()->route('News.index');
    }
}
