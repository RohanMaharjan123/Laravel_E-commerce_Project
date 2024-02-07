<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\BooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[PagesController::class,'home'])->name('home');
Route::get('cart',[PagesController::class,'cart'])->name('cart');

//Auth
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');

// Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register');
// Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');


// Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin panel routing

// Route::group(['prefix'=> 'adminpanel', 'middleware' => 'admin'], function () {
//     Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');
// });
Route::group(['prefix' => 'adminpanel'], function(){
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    //Products
    Route::group(['prefix' => 'books'], function(){
        Route::get('/', [BooksController::class, 'index'])->name('adminpanel.books');
        Route::get('/create', [BooksController::class, 'create'])->name('adminpanel.create');
        Route::get('/store', [BooksController::class, 'store'])->name('adminpanel.store');
        Route::get('/', [BooksController::class, 'index'])->name('adminpanel.books');

    });

});