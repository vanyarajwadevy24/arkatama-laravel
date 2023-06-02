<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $products = Product::all();
        $sliders = Slider::all();
        return view('landing', compact('products','sliders'));
    }
}