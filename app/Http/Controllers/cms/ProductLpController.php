<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\ProductLp;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductLpController extends Controller
{
    public function index(): View
    {
        $cards = ProductLp::query()->with('media')->get();

        return \view('cms.product-lp.index', compact('cards'));
    }

    public function lpCards(Request $request, ProductLp $card): RedirectResponse
    {
        $card->title = $request->title;
        $card->text = $request->text;
        $card->aos_text = $request->aos_text;
        $card->aos_slide_from = $request->aos;
        $card->link1 = $request->link1;
        $card->link1_text = $request->link1_text;
        $card->link2 = $request->link2;
        $card->link2_text = $request->link2_text;
        $card->update();

        if ($request->cardImage){
            Media::find($request->mediaId)->delete();
            $card->addMedia($request->cardImage)
                ->toMediaCollection('product_lp');
        }

        if ($request->sideImage){
            Media::find($request->mediaIdSlide)->delete();
            $card->addMedia($request->sideImage)
                ->toMediaCollection('product_lp_slide');
        }

//        $card = new ProductLp();
//        $card->language = $request->language;
//        $card->title = $request->title;
//        $card->text = $request->text;
//        $card->aos_text = $request->aos_text;
//        $card->collection_name = 'product_lp';
//        $card->collection_slide = 'product_lp_slide';
//        $card->aos_slide_from = $request->aos;
//        $card->link1 = $request->link1;
//        $card->link1_text = $request->link1_text;
//        $card->link2 = $request->link2;
//        $card->link2_text = $request->link2_text;
//        $card->save();


        return redirect()->back();
    }
}
