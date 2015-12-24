<?php
use Illuminate\Support\Facades\Input as Input;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'StoreController@index1');

Route::get('home', 'AdminController');

Route::controllers(['admin/categories' => 'CategoryController']);
Route::controllers(['admin/products' => 'ProductController']);
Route::controllers(['admin/settings' => 'SettingController']);
Route::controllers(['admin/payments' => 'PaymentController']);
Route::controllers(['admin' => 'AdminController']);

Route::controller('store', 'StoreController');




Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
