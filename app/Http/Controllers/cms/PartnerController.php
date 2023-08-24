<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $partners = Partner::query()->get();
        return \view('cms.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('cms.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $partner = new Partner();
        $partner->name = $request->name;
        $partner->collection_name = 'partner';
        $partner->website = $request->website;
        $partner->save();

        $partner->addMedia($request->logo)
            ->toMediaCollection('partner');

        return redirect()->route('Partners.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partner $Partner): View
    {
        return \view('cms.partners.edit')->with('partner', $Partner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partner $Partner)
    {
        $Partner->name = $request->name;
        $Partner->website = $request->website;
        $Partner->update();

        return redirect()->route('Partners.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Partner $Partner)
    {
        $Partner->delete();
        return redirect()->back();
    }
}
