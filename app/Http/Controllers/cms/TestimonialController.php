<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $testimonials = Testimonial::query()->get();
        return \view('cms.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return \view('cms.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->additional = $request->additional;
        $testimonial->comment = $request->comment;
        $testimonial->save();

        return redirect()->route('Testimonials.index');
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
    public function edit(Testimonial $Testimonial): View
    {
        return \view('cms.testimonials.edit')->with('testimonial', $Testimonial);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testimonial $Testimonial)
    {
        $Testimonial->name = $request->name;
        $Testimonial->additional = $request->additional;
        $Testimonial->comment = $request->comment;
        $Testimonial->update();

        return redirect()->route('Testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $Testimonial)
    {
        $Testimonial->delete();
        return redirect()->back();
    }
}
