<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenre;
use App\genre;
use App\product;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showList()
    {
        $genres = Genre::all();
        return view('genre.list', ['genres' => $genres,]);

    }

    public function showCreate()
    {
        return view('genre.create');
    }

    public function showUpdate($id)
    {
        return view('genre.update', ['genre' => Genre::where('id', $id)->get()->first()]);
    }

    public function delete($id)
    {
        $productsWithGenre = product::where('genre_id',$id)->count();
        $genre = genre::where('id', $id)->get()->first();
        if($productsWithGenre <= 0) {
            $genre = genre::where('id', $id)->get()->first();
            $genre->delete();
            return redirect('/genres/list');
        } else{

            return redirect('/genres/list')->withErrors("Can't delete the genre \"" . $genre->name . "\". Genre is linked to " . $productsWithGenre . " product(s)");
        }

    }

    public function store(StoreGenre $request)
    {
        $genre = new Genre;
        $genre->name = $request->get('name');
        $genre->save();
        return redirect('/genres/list');

    }

    public function storeEdit(StoreGenre $request)
    {
        $genre = genre::find($request->get('id'));
        $genre->name = $request->get('name');
        $genre->save();
        return redirect('/genres/list');

    }
}
