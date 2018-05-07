<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenre;
use App\genre;
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

    public function showDelete()
    {

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
