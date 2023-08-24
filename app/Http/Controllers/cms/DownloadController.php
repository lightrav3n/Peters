<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\BrochureDownload;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DownloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $brochures = BrochureDownload::with('media')->get();
        return \view('cms.downloads.index',compact('brochures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return \view('cms.downloads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $brochure = new BrochureDownload();
        $brochure->name = $request->name;
        $brochure->collection_name = 'brochure';
        $brochure->save();

        if ($request->brochure){
            $brochure->addMedia($request->brochure)
                ->toMediaCollection('brochure');
        }
        return redirect()->route('Download.index');
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
    public function edit(BrochureDownload $Download): View
    {
        return \view('cms.downloads.edit')->with('brochure', $Download);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BrochureDownload $Download): RedirectResponse
    {
        $Download->name = $request->name;
        $Download->update();

        return redirect()->route('Download.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrochureDownload $Download): RedirectResponse
    {
        $Download->delete();
        return redirect()->back();
    }
}
