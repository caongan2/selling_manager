<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::middleware('checkLogin')->group(function (){
    Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/searchUser', [UserController::class, 'search'])->name('search.name');
    Route::prefix('page')->group(function () {
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    });

    Route::prefix('products')->group(function (){
        Route::get('show', [LoginController::class, 'show'])->name('showProfile');
        Route::get('/cart', [CartController::class, 'index'])->name('product.cart');
        Route::get('/addToCart/{id}', [CartController::class, 'addToCart'])->name('product.addToCart');
        Route::get('/list', [ProductController::class, 'index'])->name('product.list');
        Route::get('/category/{id}', [ProductController::class, 'productByCategory'])->name('productByCate');

        Route::get('/category', [CategoryController::class, 'showCategories'])->name('category.list');
        Route::get('/editCate/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::get('/createCate', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/storeCate', [CategoryController::class, 'store'])->name('category.store');
        Route::post('/updateCate/{id}', [CategoryController::class, 'update'])->name('category.update');

        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/view_count/{id}', [ProductController::class, 'show'])->name('product.view');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
    });

    Route::prefix('user')->group(function (){
        Route::get('/list', [UserController::class, 'index'])->name('user.list');
        Route::get('/add', [UserController::class, 'create'])->name('user.create');
        Route::post('/add', [UserController::class, 'store']);
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.update');
        Route::post('/edit/{id}', [UserController::class, 'update']);
        Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
        Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.profile');
    });
});

Route::get('/login', [LoginController::class, 'formLogin'])->name('login');
Route::post('/isLogin', [LoginController::class, 'login'])->name('isLogin');
Route::get('/create', [LoginController::class, 'create'])->name('register');
Route::post('/register', [LoginController::class, 'register'])->name('user.register');


