<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::get('users/verify/{token}', 'Api\User\UserController@verify')->name('create.user.activation');

//user related route
Route::resource('users', 'Api\User\UserController');

//category related route
Route::resource('categories', 'Api\Category\CategoryController', ['only' => ['index', 'show']]);
Route::resource('categories.products', 'Api\Category\CategoryProductController', ['only' => ['index']]);
Route::resource('categories.sellers', 'Api\Category\CategorySellerController', ['only' => ['index']]);
Route::resource('categories.buyers', 'Api\Category\CategoryBuyerController', ['only' => ['index']]);

//product related route
Route::resource('products', 'Api\Product\ProductController', ['only' => ['index', 'show']]);
Route::resource('products.categories', 'Api\Product\ProductCategoryController', ['only' => ['index']]);
Route::resource('products.sellers', 'Api\Product\ProductSellerController', ['only' => ['index']]);
Route::resource('products.transactions', 'Api\Product\ProductTransactionController', ['only' => ['index']]);
Route::resource('products.buyers', 'Api\Product\ProductBuyerController', ['only' => ['index']]);

//transactions related route
Route::resource('transactions', 'Api\Transaction\TransactionController', ['only' => [
    'index', 'show'
]]);

//buyer related route
Route::resource('buyers', 'Api\Buyer\BuyerController', ['only' => ['index', 'show']]);
Route::resource('buyers.transactions', 'Api\Buyer\BuyerTransactionController', ['only' => ['index']]);
Route::resource('buyers.products', 'Api\Buyer\BuyerProductController', ['only' => ['index']]);
Route::resource('buyers.categories', 'Api\Buyer\BuyerCategoryController', ['only' => ['index']]);
Route::resource('buyers.sellers', 'Api\Buyer\BuyerSellerController', ['only' => ['index']]);

//seller related route
Route::resource('sellers', 'Api\Seller\SellerController', ['only' => ['index', 'show']]);
Route::resource('sellers.products', 'Api\Seller\SellerProductController', ['only' => ['index']]);
Route::resource('sellers.categories', 'Api\Seller\SellerCategoryController', ['only' => ['index']]);
Route::resource('sellers.transactions', 'Api\Seller\SellerTransactionController', ['only' => ['index']]);
Route::resource('sellers.buyers', 'Api\Seller\SellerBuyerController', ['only' => ['index']]);

