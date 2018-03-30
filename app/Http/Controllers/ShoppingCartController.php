<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Cart;

class ShoppingCartController extends Controller
{
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart' , $cart );

        if(!Session::has('cart')){
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shopping-cart' , ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }
    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);

        $cart->reduceByOne($id);
        Session::put('cart', $cart);

        return view('shopping-cart' , ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);

    }

    public function getCart(){
    if(!Session::has('cart')){
        return view('shopping-cart');

    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
    return view('shopping-cart' , ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
}
}
