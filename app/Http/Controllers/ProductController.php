<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function detail($id)
    {
        //return view('product',['product' => Product::join('genres','genres.id', '=', 'products.genre')->where('products.id',$id)->first()]);

       //return view('product',['product' => Product::where('products.id',$id)->first()]);

        //$product = Product::where('products.id',$id)->first()->with('genre')->get();

      //  $product = Product::with('genre')->get()->where('id',$id);
        return view('product',['product'=>Product::with('genre')->get()->where('id',$id)->first()]);


    }


    public function showCatalog()
    {
        $products =  Product::all();
        return view('catalog',['products' => $products]);
    }

    public function showList()
    {
        return view('product.list');
    }

    public function showCreate()
    {
        return view('product.create');
    }

    public function showUpdate()
    {

    }

    public function showDelete()
    {

    }

    public function store(StoreProduct $request )
    {
        $imageName = $request->file('product-image')->getClientOriginalExtension();
        $request->file('product-image')->move(public_path('css/img'),$imageName);
    }
}
