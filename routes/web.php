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
    return view('dashboard');
});

Route::get('/dashboard', function () { return view('dashboard');})->name('dashboard');
Route::resource('/productlist', \App\Http\Controllers\ProductListController::class,[
    'names' => [
        'index' => 'productlist'
    ]
] );
Route::get('/menu', function () { return view('menu');})->name('menu');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::resource('/product', \App\Http\Controllers\ProductController::class);
    Route::resource('/carousel', \App\Http\Controllers\CarouselController::class);
});

