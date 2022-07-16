<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

use App\Http\Controllers\ShopifyController;
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
    return view("index");
});
Route::get('/product-index',[ProductController::class,'index']);

Route::get('/install',[ShopifyController::class,'install']);

route::get('/url',[ShopifyController::class,'url'])->name('url');

route::Post('/shopify',[ShopifyController::class,'shopify'])->name('shopify');


