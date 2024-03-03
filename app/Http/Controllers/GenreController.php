<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        // dd(Genre::all());
        // return view('admin.pages.genres.index');
        return view('admin.pages.genres.index', ['genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //validate
        $request->validate([
            'name' => ['required', 'unique:genres', 'max:255'] //'required|unique:genres|max:255'
        ]);
    
        // //store
        // $genre = new Genre();
        // $genre->name = $request->name;
        // $genre->save();
    
    
        Genre::create([
            'name' => $request->name,
        ]);
        //return response
        return back()->with('sucess', 'Saved Genre');
    }
    /**
     * Display the specified resource.
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Genre $genre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Genre $genre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        // dd($request->all());
        Genre::findOrFail($id)->delete();
        return back()->with('success','Genre Deleted');
    }
    /*
    
    */
}
