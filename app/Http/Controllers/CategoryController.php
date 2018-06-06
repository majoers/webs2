<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\StoreCategory;
use App\product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showList()
    {
        $category = category::all();
        return view('category.list', ['categories' => $category]);

    }

    public function showCreate()
    {
        return view('category.create');
    }

    public function showUpdate($id)
    {
        return view('category.update', ['category' => category::where('id', $id)->get()->first()]);
    }

    public function delete($id)
    {
        $productsWithCategory = product::where('category_id',$id)->count();
        $category = category::where('id', $id)->get()->first();
        if($productsWithCategory <= 0) {
            $category->delete();
            return redirect('/categories/list');
        } else{

            return redirect('/categories/list')->withErrors("Can't delete the category \"" . $category->name . "\". Category is linked to " . $productsWithCategory . " product(s)");
        }





    }

    public function store(StoreCategory $request)
    {
        $category = new Category;
        $category->name = $request->get('name');
        $category->save();
        return redirect('/categories/list');

    }

    public function storeEdit(StoreCategory $request)
    {
        $category = category::find($request->get('id'));
        $category->name = $request->get('name');
        $category->save();
        return redirect('/categories/list');

    }
}
