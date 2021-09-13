<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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
    return view('index');
    // $user = DB::table('userdemo')->get();
    // dd($user);
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('login', function () {
    return view('login');
});
Route::get('signup', function () {
    return view('signup');
});
// Route::get('/admin', 'LoginController@index')->name('home');


// Route::get('/demo', 'CustomersController@index')->name('home');
// Route::get('/demo/add', 'CustomersController@create')->name('home');
// Route::post('/demo/add', 'CustomersController@store')->name('insert');

// Route::get('/demo/edit/{id}', 'CustomersController@edit')->name('edit');
// Route::post('/demo/edit/{id}', 'CustomersController@update')->name('insert');
