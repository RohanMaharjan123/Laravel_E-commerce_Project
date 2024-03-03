<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //function for admin panel

    // function to use for displaying the table data
    public function index(){
        // $books = Book::with('genre')->orderBy('created_at', 'desc')->get();
        $books =Book::all();
        return view('admin.pages.books.index',['books' => $books]);
    }

    //create function

    public function create(){
        $genres = Genre::all();
        return view('admin.pages.books.create',['genres' => $genres]);

    }

    //store
    public function store(Request $request){
        // dd($request->all());

        //validate
        $request->validate([
            'title' => ['required', 'max:255'],
            'genre_id' => ['required'], // Make sure genre_id is required
            'price' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048']
        ]);

        //store image
        $image_name = 'books/' . time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
        // dd($image_name);
        $request->image->storeAs('public', $image_name);
        //store

        $book = Book::create([
            'title' => $request->title,
            'genre_id' => $request->genre_id,
            'price' => $request->price * 100,
            'description' => $request->description,
            'image' => $image_name
        ]);
        


        //response
        return back()->with('success', 'Book saved');
    }

    //Edit
    public function edit($id){
        $book =Book::findOrFail($id);
        $genres = Genre::all();
        return view('admin.pages.books.edit',['genres' => $genres, 'book' => $book]);
    }

    //Update
    public function update(Request $request, $id){
        // return "updating the data";
        // dd($request->all());
         //validate
        $request->validate([
            'title' => ['required', 'max:255'],
            'genre_id' => ['required'], // Make sure genre_id is required
            'price' => ['required'],
            'image' => ['image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048']
        ]);
        $book = Book::findOrFail($id);

        //store image
        $image_name = $book->image;
        if($request->image){
        $image_name = 'books/' . time() . rand(0, 9999) . '.' . $request->image->getClientOriginalExtension();
        // dd($image_name);
        $request->image->storeAs('public', $image_name);
        }   
        //store

        $book->update([
            'title' => $request->title,
            'genre_id' => $request->genre_id,
            'price' => $request->price * 100,
            'description' => $request->description,
            'image' => $image_name
        ]);
        
        //response
        return back()->with('success', 'Book saved');

    }

    //Destroy
    public function destroy($id){
        // return "deleting the data";
        Book::findOrFail($id)->delete();
        return back()->with('success', 'Book Deleted');
    }
    
}
