<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubcategory;
use App\subcategory;
use App\product;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function showList()
    {
        $subcategory = subcategory::all();
        return view('subcategory.list', ['subcategories' => $subcategory,]);

    }

    public function showCreate()
    {
        return view('subcategory.create');
    }

    public function showUpdate($id)
    {
        return view('subcategory.update', ['subcategory' => subcategory::where('id', $id)->get()->first()]);
    }

    public function delete($id)
    {
        $productsWithSubCategory = product::where('subcategory_id',$id)->count();
        $subcategory = subcategory::where('id', $id)->get()->first();
        if($productsWithSubCategory <= 0) {
            $subcategory = subcategory::where('id', $id)->get()->first();
            $subcategory->delete();
            return redirect('/subcategories/list');
        } else{

            return redirect('/subcategories/list')->withErrors("Can't delete the subcategory \"" . $subcategory->name . "\". Subcategory is linked to " . $productsWithSubCategory . " product(s)");
        }

    }

    public function store(StoreSubcategory $request)
    {
        $subcategory = new subcategory;
        $subcategory->name = $request->get('name');
        $subcategory->save();
        return redirect('/subcategories/list');

    }

    public function storeEdit(StoreSubcategory $request)
    {
        $subcategory = subcategory::find($request->get('id'));
        $subcategory->name = $request->get('name');
        $subcategory->save();
        return redirect('/subcategories/list');

    }
}
