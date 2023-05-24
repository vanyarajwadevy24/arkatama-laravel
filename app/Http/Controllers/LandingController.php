<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $products = 
        [
            [
                "nama" => " Vanilla Ice Cream ",
                "harga" => 35000,
                "img"=> "https://media.istockphoto.com/id/471317762/photo/vanilla-ice-cream-cone.jpg?s=612x612&w=0&k=20&c=flLbm_rGYxD66_1O6UHizwLtnes0-gExeeIw-uprMcQ="
            
            ],
            [
                "nama" => " Chocolate Ice Cream ",
                "harga" => 55000,
                "img"=> "https://media.istockphoto.com/id/509681270/photo/ice-cream-cone-with-three-scoops-of-chocolate-ice-cream.jpg?s=612x612&w=0&k=20&c=raHAjT6PUsNAdg_3h1kIrr7soe5E-D2-TQKAc9mT0qI="
            
            ],
            [
                "nama" => " Matcha Ice Cream ",
                "harga" => 129000,
                "img"=> "https://i.pinimg.com/originals/d6/a1/fb/d6a1fbcd37b955aebdc3242f3bd41443.jpg"
            
            ],
            [
                "nama" => " Dulce de Leche Ice Cream ",
                "harga" => 89000,
                "img"=> "https://tamingofthespoon.com/wp-content/uploads/2015/04/Dulce-de-Leche-Ice-Cream-R1-1.jpg"
            
            ],
            ];
        return view('landing', compact('products'));
    }
}
