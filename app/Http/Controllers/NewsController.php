<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        return \view('news.index');
    }

    public function articleRead(Request $request, $language, $slug)
    {
        $activity = News::where('slug', $slug)->with(['media','category'])->first();

        if(!$request->cookie($activity->id)){
            Cookie::queue($activity->id, '1', 60);
            $activity->incrementViewCount();
        }
        return view('news.read', compact('activity'));
    }
}
