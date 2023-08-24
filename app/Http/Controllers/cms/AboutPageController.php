<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\PageContent;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutPageController extends Controller
{
    public function index(): View
    {
        $headlineTexts = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'about_hl');
        })->get();

        $profileTexts = Language::query()->with('privacyPolicy', function ($q){
            $q->where('page_name', 'company_profile');
        })->get();

        return \view('cms.about.index', compact('headlineTexts', 'profileTexts'));
    }

    public function aboutHlUpdate(Request $request): RedirectResponse
    {
        $existing_content = PageContent::query()->where([['page_name', 'about_hl'], ['language', $request->language]])->first();
        if ($existing_content !== null)
        {
            $existing_content->update([
                'section_name' => $request->hl_title,
                'page_content' => $request->page_content
            ]);
        }
        else
        {
            $content = new PageContent();
            $content->language = $request->language;
            $content->page_name = 'about_hl';
            $content->page_content = $request->page_content;
            $content->save();
        }

        return redirect()->back();
    }

    public function companyProfileUpdate(Request $request): RedirectResponse
    {
        $existing_content = PageContent::query()->where([['page_name', 'company_profile'], ['language', $request->language]])->first();
        if ($existing_content !== null)
        {
            $existing_content->update([
                'section_name' => $request->profile_title,
                'page_content' => $request->page_content
            ]);
        }
        else
        {
            $content = new PageContent();
            $content->language = $request->language;
            $content->page_name = 'company_profile';
            $content->page_content = $request->page_content;
            $content->save();
        }

        return redirect()->back();
    }
}
