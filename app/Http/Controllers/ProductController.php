<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCard;
use App\Models\ProductCategories;
use App\Models\ProductLp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $cards = ProductLp::query()->where('language', Session::get('language'))->get();
        return \view('products.index', compact('cards'));
    }
    public function products($language, $slug): View
    {
        $category = ProductCategories::query()->where('slug', $slug)->first();
//        $products = Product::query()->where('category_id', $category->id)
//            ->with('category')
//            ->with('descriptions')->get();
        $slugId = $category->id;
        $categoryDescription = ProductCard::query()
            ->where('language', \session()->get('language'))
            ->where('link', $slug == 'offers' ? '/products/offers' : $slug)
            ->first();

        return \view('products.listing', compact('slugId', 'categoryDescription'));
    }

    public function show(Request $request, $language, $slug): View
    {
        $product = Product::query()->where('product_slug', $slug)
            ->with(['category', 'media'])
            ->with('descriptions')->first();

        $categoryProducts = Product::query()->whereNotIn('id',[$product->id])->where('category_id', $product->category_id)->with('media')->get();
        $categories = ProductCategories::query()->whereNotIn('slug',['offers'])->get();

        if(!$request->cookie($product->id)){
            Cookie::queue($product->id, '1', 60);
            $product->incrementViewCount();
        }

        return \view('products.show', compact('categoryProducts', 'categories'))->with('product', $product);
    }
}
