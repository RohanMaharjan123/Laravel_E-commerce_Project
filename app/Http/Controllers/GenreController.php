<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    //index
    public function index(){
        return view('admin.pages.genres.index');
    }
}
