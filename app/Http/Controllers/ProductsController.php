<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProductsController;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        return view('products.index', [
            'products'=> $products
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Products $products)
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_product' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'image|file|max:4000',
            'harga' => 'integer|required',
            'category_id' => 'required',
            'rating' => 'required'
        ]);
        if ($request->file('gambar')){
            $validasi['gambar'] = $request->file('gambar')->store('product-image');
        }
        Product::create($validasi);
        return redirect()->route('products.index');
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
    public function edit(Products $products)
    {
        return view('products.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
            $validated = $request->validate([
                'products_name' => 'required'
            ]);
            $products->update($validated);
            return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();
        return redirect()->route('products.index');
    }
}