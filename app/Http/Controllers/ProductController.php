<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //function for admin panel

    // function to use for displaying the table data
    public function index(){
        return view('admin.pages.books.index');
    }

    //create function

    public function create(){
        return view('admin.pages.books.create');
    }

    //store 
    public function store(Request $request){
        return "storing data";
    }

    //Edit
    public function edit(){
        return view('admin.pages.books.edit');
    }

    //Update
    public function update(){
        return "updating the data";
    }

    //Destroy
    public function destroy($id){
        return "deleting the data";
    }
}
