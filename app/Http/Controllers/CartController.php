<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;
// use Darryldecode\Cart\Facades\CartFacade;

class CartController extends Controller
{
    public function index()
    {
        Session::put('saveCart', false);
        Session::put('restoreCart', false);
        Session::put('contactMessage', false);

        return view('cart.cart');
    }

    public function storeCart()
    {
        $product = Product::all();
        $username = Auth::user()->username;
        Session::put('saveCart', true);
        Session::put('restoreCart', false);
        Session::put('cartMessage', false);

        if (Cart::content()->count() > 0) {
            Cart::store($username);
            // Session::put('saveCart', true);
return view('cart.cart', compact('product'));
        }

    }

    public function restoreCart()
    {
        Session::put('restoreCart', true);
        Session::put('saveCart', false);
        Session::put('contactMessage', false);
        $product = Product::all();
        $username = Auth::user()->username;
        Cart::restore($username);

        return view('cart.cart', compact('product'));
    }

    public function destroyCart()
    {
        $product = Product::all();
        $username = Auth::user()->username;

        Cart::destroy();
Session::put('clearCart', true);
        return view('categories');
    }

    public function destroyRow($rowId)
    {

        // Cart::remove($rowId);
        // dd($rowId);
        // Cart::content()->count() = 0;

        // session()->flash('message', 'Your message has been successfully sent.');

        // return view('cart.cart');
        // return view('cart.cart');

    }
}