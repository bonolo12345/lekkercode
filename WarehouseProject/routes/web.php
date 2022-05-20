<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;

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
    $products = Product::latest()->paginate(5);

    return view('products.index',compact('products'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
});

Route::resource('products', ProductController::class);
Route::get('/search/', [SearchController::class,'search'])->name('search');

