<?php

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
    return view('welcome');
});

Auth::routes();



Route::get("/", [App\Http\Controllers\ShopController::class, 'index'])->name('index');
Route::post("/", [App\Http\Controllers\ShopController::class,'store'])->name('store');
Route::get("/create", [App\Http\Controllers\ShopController::class, 'create'])->name('create');
Route::get("/{id}", [App\Http\Controllers\ShopController::class, 'show'])->name('show');
Route::delete("/{id}", [App\Http\Controllers\ShopController::class, 'destroy'])->name('destroy');

Route::get("/createProduct/", [App\Http\Controllers\ProductController::class, 'createProduct'])->name('createProduct');
// Route::get("/createProduct/{id}", [App\Http\Controllers\ProductController::class, 'createProduct'])->name('createProduct');

Route::get("/showProduct/{id}", [App\Http\Controllers\ProductController::class, 'showProduct'])->name('showProduct');
Route::post("/storeProduct/{id}", [App\Http\Controllers\ProductController::class, 'storeProduct'])->name('storeProduct');

// Route::post("/{id}", [App\Http\Controllers\ProductController::class,'store'])->name('store');    
// Route::get("/{id}/{id}", [App\Http\Controllers\ProductController::class,'show'])->name('show');
// Route::delete("/{id}/{id}",[App\Http\Controllers\ProductController::class,'destroy'])->name('destroy');

/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');*/
