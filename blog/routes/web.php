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
Route::get('cart', function () {
    return view('cart');
});
Route::get('login', function () {
    return view('login');
});
Route::get('signup', function () {
    return view('signup');
});


Route::get('qlct', 'CustomersController@index')->name('home');
Route::get('qlct/add', 'CustomersController@create')->name('qlct.add');
Route::post('qlct/add', 'CustomersController@store')->name('qlct.insert');
Route::get('qlct/edit/{id}', 'CustomersController@edit')->name('qlct.edit');
Route::post('qlct/edit/{id}', 'CustomersController@update')->name('qlct.update');
Route::get('qlct/delete/{id}', 'CustomersController@destroy')->name('qlct.delete');

// Route::get('/demo', 'CustomersController@index')->name('home');
// Route::get('/demo/add', 'CustomersController@create')->name('home');
// Route::post('/demo/add', 'CustomersController@store')->name('insert');

// Route::get('/demo/edit/{id}', 'CustomersController@edit')->name('edit');
// Route::post('/demo/edit/{id}', 'CustomersController@update')->name('insert');

