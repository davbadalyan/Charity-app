<?php

namespace App\Http\Controllers;

use App\Http\Requests\MainSliderUpdateRequest;
use App\Models\MainSlider;
use Illuminate\Http\Request;

class MainSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mainSliders = MainSlider::all();

        return view('admin.main_sliders.index')->with(compact('mainSliders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function edit(MainSlider $mainSlider)
    {
        return view('admin.main_sliders.edit')->with(compact('mainSlider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainSlider  $mainSlider
     * @return \Illuminate\Http\Response
     */
    public function update(MainSliderUpdateRequest $request, MainSlider $mainSlider)
    {
        $data = $request->except(['file', '_token']);

        $mainSlider->update($data);
        $mainSlider->addAllMediaFromRequest('file')->each(fn ($fileAdder) => $fileAdder->toMediaCollection());

        return back()->withSuccess('MainSlider updated.');
    }
}
