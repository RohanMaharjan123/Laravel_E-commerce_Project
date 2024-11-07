<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart($id)
    {
        // dd(session()->all());
        // session()->put('cart',['id' => 1]);
        session()->forget('cart');
        return session()->get('cart');
    }
}
