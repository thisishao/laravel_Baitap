<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Admin\UsersController;


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





Auth::routes();

Route::get('admin/home', 'HomeController@index')->name('admin.home');
Route::get('admin/profile', 'Admin\UsersController@edit')->name('admin.profile');
Route::get('admin/logout', 'HomeController@logout')->name('admin.logout');
Route::get('admin/login', 'HomeController@logout')->name('admin.login');
