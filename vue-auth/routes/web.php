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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//User
Route::get('/user', 'App\Http\Controllers\HomeController@user');
Route::get('/user/list', 'App\Http\Controllers\HomeController@userList');
Route::get('/order/list', 'App\Http\Controllers\HomeController@orderList');

//Orders
Route::post('/orders', 'App\Http\Controllers\HomeController@orders');

Route::get('/{path}', function(){
    return view('welcome');

});


//Front End

Route::get('/get/cart', 'App\Http\Controllers\CartController@showCart');
Route::post('/add/to/cart', 'App\Http\Controllers\CartController@addToCart');
Route::get('/remove/cart', 'App\Http\Controllers\CartController@removeCart');

