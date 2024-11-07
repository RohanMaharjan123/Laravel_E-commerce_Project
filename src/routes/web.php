<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PagesController;

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
Route::get('/cart',[PagesController::class,'cart'])->name('cart');
Route::get('/wish-list',[PagesController::class,'wishlist'])->name('wishlist');
Route::get('/account',[PagesController::class,'account'])->name('account')->middleware('auth');
// Route::get('/account',[PagesController::class,'account'])->name('account');
Route::get('/books/{id}',[PagesController::class,'book'])->name('book');

//Cart
Route::post('/add-to-cart/{id}',[CartController::class,'addToCart'])->name('addToCart');

//Auth
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('auth');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register');
// Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');


Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin panel routing

// Route::group(['prefix'=> 'adminpanel', 'middleware' => 'admin'], function () {
//     Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');
// });
Route::group(['prefix' => 'adminpanel'], function(){
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    //Route of Books
    Route::group(['prefix' => 'books'], function(){
        Route::get('/', [BookController::class, 'index'])->name('adminpanel.books');
        Route::get('/create', [BookController::class, 'create'])->name('adminpanel.books-create');
        Route::post('/store', [BookController::class, 'store'])->name('adminpanel.books-store');
        Route::get('/{id}', [BookController::class, 'edit'])->name('adminpanel.books-edit');
        Route::put('/{id}', [BookController::class, 'update'])->name('adminpanel.books-edit');
        Route::delete('/{id}', [BookController::class, 'destroy'])->name('adminpanel.books-destroy');
    });
    //Book Genres
    Route::group(['prefix' => 'genres'], function(){
        Route::get('/', [GenreController::class, 'index'])->name('adminpanel.genres');
        Route::post('/', [GenreController::class, 'store'])->name('adminpanel.genres-store');
        Route::delete('/{id}', [GenreController::class, 'destroy'])->name('adminpanel.genres-destroy');

    });

});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
