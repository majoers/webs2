<?php

namespace App\Http\Controllers;

use App\category;
use App\subcategory;
use App\Http\Requests\StoreProduct;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id)
    {
        return view('product', ['product' => Product::with('subcategory')->get()->where('id', $id)->first()]);
    }

    public function showCatalog()
    {
        $subcategories = subcategory::all();
        $categories = category::all();
        $products = Product::all();
        return view('catalog', ['products' => $products, 'subcategories' => $subcategories, 'categories' => $categories]);
    }

    public function showCatalogFilter(Request $request)
    {
        $subcategories = subcategory::all();
        $categories = category::all();
        $products = Product::all();
        if ($request->get('category') > 0) {
            $products = $products->where('category_id', '=', $request->get('category'));
        }
        if ($request->get('subcategory') > 0) {
            $products = $products->where('subcategory_id', '=', $request->get('subcategory'));
        }
        return view('catalog', ['products' => $products, 'subcategories' => $subcategories, 'categories' => $categories]);
    }

    public function searchItem(Request $request){
        $subcategories = subcategory::all();
        $categories = category::all();
            if ($request->get('q') != null && $request->get('q') != "") {
                $input = $request->get('q');
                $products = Product::where('name', 'LIKE', '%' . $input . "%")->get();
                return view('catalog', ['products' => $products, 'subcategories' => $subcategories, 'categories' => $categories]);
            } else {
                return back();
            }

        }

    public function showList()
    {
        $products = Product::with('subcategory', 'category')->get();
        return view('product.list', ['products' => $products,]);
    }

    public function showCreate()
    {
        $subcategories = subcategory::all();
        $categories = category::all();
        return view('product.create', ['subcategories' => $subcategories, 'categories' => $categories]);
    }

    public function showUpdate($id)
    {
        $subcategories = subcategory::all();
        $categories = category::all();
        return view('product.update', ['product' => Product::where('id', $id)->get()->first(), 'subcategories' => $subcategories, 'categories' => $categories]);
    }

    public function delete($id)
    {
        $product = product::where('id',$id)->get()->first();
        $product->delete();
        return redirect('/products/list');
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
        $product->subcategory_id = $request->get('subcategory');
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
        $product->subcategory_id = $request->get('subcategory');
        $product->category_id = $request->get('category');
        $product->name = $request->get('name');
        $product->image = $imageName;
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->save();
        return redirect('/products/list');
    }
}
