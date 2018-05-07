<?php

namespace App\Http\Controllers;

use App\category;
use App\Http\Requests\StoreCategory;
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

    public function showDelete()
    {

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
