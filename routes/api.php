<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ShopifyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//create product
Route::get('/create_webhook',[ShopifyController::class,'createWebhook']);
Route::post('/create_product',[ShopifyController::class,'createProduct']);

//delete product
Route::get('/delete_webhook',[ShopifyController::class,'deleteWebhook']);
Route::post('/delete_product',[ShopifyController::class,'deleteProduct']);

//update product
Route::any('/update_webhook',[ShopifyController::class,'updateWebhook']);
Route::post('/update_product',[ShopifyController::class,'updateProduct']);