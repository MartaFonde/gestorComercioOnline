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

Route::group(['prefix' => 'shop','middleware' => 'auth'], function(){
    Route::get("/create", [App\Http\Controllers\ShopController::class, 'create'])->name('create');
    Route::post("/", [App\Http\Controllers\ShopController::class, 'store'])->name('store');
    Route::delete("/{id}", [App\Http\Controllers\ShopController::class, 'destroy'])->name('destroy');
});

Route::prefix("shop")->group(function () {
    Route::get("/", [App\Http\Controllers\ShopController::class, 'index'])->name('index');
    Route::get("/{id}", [App\Http\Controllers\ShopController::class, 'show'])->name('show'); 
});

Route::prefix("product")->group(function () {
    Route::get("/showProduct/{id}", [App\Http\Controllers\ProductController::class, 'showProduct'])->name('showProduct');
});

Route::group(['prefix' => 'product', 'middleware' =>'auth'], function(){
    Route::get("/createProduct/{id}", [App\Http\Controllers\ProductController::class, 'createProduct'])->name('createProduct');
    Route::post("/storeProduct/{id}", [App\Http\Controllers\ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::delete("/destroyProduct/{id}", [App\Http\Controllers\ProductController::class, 'destroyProduct'])->name('destroyProduct');
});



/*Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


