<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /*
    public function __construct()
    {
        $this->middleware('auth');
    }
*/
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $products =  Product::orderBy('id', 'DESC')->take(6)->get();
        return view('home',['products' => $products]);
    }
    public function showAbout()
    {
        return view('about');
    }

    public function showAdmin()
    {
        return view('dashboard');
    }




}
