<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\PageContent;
use App\Models\ProductCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HomePageController extends Controller
{
    public function index(): View
    {
        $headlines = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'home_hl');
        })->get();

        $expertises = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'home_expertise');
        })->get();

        return \view('cms.homepage.index', compact('headlines', 'expertises'));
    }

    public function homepageHlUpdate(Request $request): RedirectResponse
    {
        $existing_content = PageContent::query()->where([['page_name', 'home_hl'], ['language', $request->language]])->first();
        if ($existing_content !== null)
        {
            $existing_content->update([
                'page_content' => $request->page_content
            ]);
        }
        else
        {
            $content = new PageContent();
            $content->language = $request->language;
            $content->page_name = 'home_hl';
            $content->page_content = $request->page_content;
            $content->save();
        }

        return redirect()->back();
    }

    public function productCards(): View
    {
        $cards = ProductCard::query()->where('position', 1)->get();

        return \view('cms.homepage.product_cards', compact('cards'));
    }
    public function productCardsUpdate(Request $request, ProductCard $card): RedirectResponse
    {
        $card->title = $request->title;
        $card->text = $request->text;
        $card->link = $request->link;
        $card->update();

        if ($request->cardImage){
            Media::find($request->mediaId)->delete();

            $card->addMedia($request->cardImage)
                ->toMediaCollection('home_product_cards');
        }

        return redirect()->back();
    }

    public function productCards2(): View
    {
        $cards = ProductCard::query()->where('position', 2)->get();

        return \view('cms.homepage.product_cards2', compact('cards'));
    }
    public function productCards2Update(Request $request, ProductCard $card): RedirectResponse
    {
        $card->title = $request->title;
        $card->text = $request->text;
        $card->link = $request->link;
        $card->update();

        if ($request->cardImage){
            Media::find($request->mediaId)->delete();

            $card->addMedia($request->cardImage)
                ->toMediaCollection('home_product_cards');
        }

        return redirect()->back();
    }

    public function homepageExpertiseUpdate(Request $request): RedirectResponse
    {
        $existing_content = PageContent::query()->where([['page_name', 'home_expertise'], ['language', $request->language]])->first();
        if ($existing_content !== null)
        {
            $existing_content->update([
                'page_content' => $request->page_content
            ]);
        }
        else
        {
            $content = new PageContent();
            $content->language = $request->language;
            $content->page_name = 'home_expertise';
            $content->page_content = $request->page_content;
            $content->save();
        }

        return redirect()->back();
    }
}
