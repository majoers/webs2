<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{

    public function index()
    {

       $products =  Product::take(6)->get();
        return view('home',['products' => $products]);
    }

    public function showAbout()
    {

        return view('about');
    }
}
