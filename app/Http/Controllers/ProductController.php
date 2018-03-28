<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        //return view('product',['product' => Product::join('genres','genres.id', '=', 'products.genre')->where('products.id',$id)->first()]);

        return view('product',['product' => Product::where('products.id',$id)->first()]);
    }


    public function showCatalog()
    {
        $products =  Product::all();
        return view('home',['products' => $products]);
    }


}
