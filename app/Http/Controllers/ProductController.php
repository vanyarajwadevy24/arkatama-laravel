<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:3',
            'gambar' => 'file|image|max:4000',
            'deskripsi' => 'required',
            'harga' => 'required',
            'category_id' => 'required'
        ]);

        if ($request->file('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('gambar');
        }
        Product::create($validated);
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'gambar' => 'image|max:4000',
            'deskripsi' => 'required',
            'harga' => 'required',
            'category_id' => 'required'
        ]);
        if ($request->hasFile('gambar')){
            if ($request->oldImage){
                Storage::delete($request->oldImage);
            }
            if ($request->file('gambar')) {
                $validated['gambar'] = $request->file('gambar')->store('gambar');
            }
        }
        $product->update($validated);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->gambar);
        $product->delete();
        return redirect()->route('products.index');
    }
}