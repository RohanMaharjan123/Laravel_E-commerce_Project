<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Home
    public function home()
    {
        // $books = Books::with('genre')->orderBy('created_at', 'desc')->get();
        // return view("pages/home", ['books'=> $books]);
        return view("pages/home");
    }
    //Cart
    public function cart()
    {
        return view("pages.cart");
    }
     //Cart
    public function wishlist()
    {
        return view("pages.wishlist");
    }
      //Cart
    public function account()
    {
        return view("pages.account");
    }
    public function book($id)
    {
        $book = Book::with('genre')->findOrfail($id);
        return view("pages.book", ['book' => $book]);
    }
}
