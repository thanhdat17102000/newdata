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

Route::get('/',[ShopifyController::class,'index']);
Route::get('/product-index',[ProductController::class,'index']);

Route::get('/install',[ShopifyController::class,'install']);

route::get('/url',[ShopifyController::class,'url'])->name('url');

route::Post('/shopify',[ShopifyController::class,'shopify'])->name('shopify');


Route::get('/create_webhook',[ShopifyController::class,'createWebhook']);
Route::post('/create_product',[ShopifyController::class,'createProduct']);

//delete product
Route::get('/delete_webhook',[ShopifyController::class,'deleteWebhook']);
Route::post('/delete_product',[ShopifyController::class,'deleteProduct']);

//update product
Route::any('/update_webhook',[ShopifyController::class,'updateWebhook']);
Route::post('/update_product',[ShopifyController::class,'updateProduct']);

// Listproduct
Route::get('/productManage/{id}',[ProductController::class,'index']);

