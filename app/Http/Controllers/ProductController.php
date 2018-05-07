<?php

namespace App\Http\Controllers;

use App\category;
use App\genre;
use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id)
    {
        return view('product', ['product' => Product::with('genre')->get()->where('id', $id)->first()]);
    }

    public function showCatalog()
    {
        $genres = genre::all();
        $categories = category::all();
        $products = Product::all();
        return view('catalog', ['products' => $products, 'genres' => $genres, 'categories' => $categories]);
    }

    public function showCatalogFilter(Request $request)
    {
        $genres = genre::all();
        $categories = category::all();
        $products = Product::all();
        if ($request->get('category') > 0) {
            $products = $products->where('category_id', '=', $request->get('category'));
        }
        if ($request->get('genre') > 0) {
            $products = $products->where('genre_id', '=', $request->get('genre'));
        }
        return view('catalog', ['products' => $products, 'genres' => $genres, 'categories' => $categories]);
    }

    public function showList()
    {
        $products = Product::with('genre', 'category')->get();
        return view('product.list', ['products' => $products,]);
    }

    public function showCreate()
    {
        $genres = genre::all();
        $categories = category::all();
        return view('product.create', ['genres' => $genres, 'categories' => $categories]);
    }

    public function showUpdate($id)
    {
        $genres = genre::all();
        $categories = category::all();
        return view('product.update', ['product' => Product::where('id', $id)->get()->first(), 'genres' => $genres, 'categories' => $categories]);
    }

    public function showDelete($id)
    {

    }

    public function store(StoreProduct $request)
    {
        $product = new Product;
        if ($request->file('image') !== null) {
            $imageName = strtolower(str_replace(" ", "", $request->get('name'))) . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('css/img'), $imageName);
            $product->image = $imageName;
        } else {
            $product->image = "no_image.png";
        }
        $product->genre_id = $request->get('genre');
        $product->category_id = $request->get('category');
        $product->name = $request->get('name');

        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();
        return redirect('/products/list');
    }

    public function storeEdit(StoreProduct $request)
    {
        $product = product::find($request->get('id'));
        $imageName = $product->image;
        if ($request->file('image') !== null) {
            $imageName = strtolower(str_replace(" ", "", $request->get('name'))) . "." . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('css/img'), $imageName);
        }
        $product->genre_id = $request->get('genre');
        $product->category_id = $request->get('category');
        $product->name = $request->get('name');
        $product->image = $imageName;
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();
        return redirect('/products/list');
    }
}
