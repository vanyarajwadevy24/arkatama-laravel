<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('sliders.index',[
            'sliders' => $sliders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Sliders $sliders)
    {
        $validasi = $request->validate([
            'caption' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|file|max:3000'
        ]);
        
        if ($request->file('gambar')){
            $validasi['gambar'] = $request->file('gambar')->store('sliders');
        };
        $slider->create($validasi);
        return redirect()->route('sliders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Sliders $sliders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Sliders $sliders)
    {
        return view('sliders.edit',[
            'sliders' => $sliders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderRequest  $request
     * @param  \App\Models\Sliders  $sliders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sliders $sliders)
    {
        $validasi = $request->validate([
            'gambar' => 'image|file|max:3000',
            'caption' => 'required',
            'deskripsi' => 'required'
        ]);
        
        if ($request->file('gambar')){
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validasi['gambar'] = $request->file('gambar')->store('sliders');
        };
        $slider->update($validasi);
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sliders $sliders)
    {
        if ($slider->gambar){
            Storage::delete($slider->gambar);
        };
        $slider->delete();
        return redirect()->route('sliders.index');
    }
}