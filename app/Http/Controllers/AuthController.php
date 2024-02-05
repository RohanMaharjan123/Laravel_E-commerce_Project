<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //Show login page
    public function showLogin()
    {
        return view('pages.login');
    }

    //show register page
    public function showRegister()
    {
        return view('pages.register');
    }

    //Register User
    public function postRegister(Request $request){
        //validation process
        // dd($request->all());
        $request->validate([
            'name' => 'required,',
            'email' => 'required',
            'password'=> 'required'
        ]);

        //registration process
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        


        //login
        Auth::login($user);

        return back()->with('success', 'Successfully Logged In!');
    }


    // Login User
    
    //Logout
    public function logout()
    {
        Auth::logout();
    }

    //Password Reset
    
}
