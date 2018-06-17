<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Auth;


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
        if($cart->items[$id]['qty'] > 0 ) {
            $cart->reduceByOne($id);

            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }
        }
            return view('shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getAddByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Cart($oldCart);

        $cart->addByOne($id);
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

    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        if($cart->items[$id]['qty'] > 0 ) {
            $cart->removeItem($id);
            if (count($cart->items) > 0) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }
        }
        return view('shopping-cart' , ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function postCheckout(){
        $products =  Product::orderBy('id', 'DESC')->take(6)->get();
        $user = Auth::user();
        if ($user != null) {
            Session::forget('cart');
            return view('home',['products' => $products])->with('success', 'Successfully purchased');
        }else{
            return view('auth.login');
        }

    }
}
