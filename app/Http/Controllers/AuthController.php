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
            'name' => 'required', //'required|min:3|max:255'
            'email' => 'required', //'required|email|max:255|unique:users'
            'password'=> 'required', //'required|min:8|confirmed'
        ]);

        //registration process
        $user = User::create([
            'name' => $request->name, // 'name' => $request['name],
            'email' => $request->email, //'email' => $request['email'],
            'password' => Hash::make($request->password), //'password' => Hash::make($request['password])
        ]);
    
        //login
        Auth::login($user);

        return back()->with('success', 'Successfully Logged In!');
    }


    // Login User
    public function postLogin(Request $request){
        // dd($request->all());

        //validate
        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Login
        if(Auth::attempt($details))
        {
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Invalid Login Details'
        ]);

        //return value
    }
    //Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    //Password Reset
    
}
