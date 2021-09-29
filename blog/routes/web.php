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



Route::group([
    'namespace' => 'frontend'
], 
function(){
    Route::get('/blog', 'BlogController@index')->name('frontend.blog');
    Route::get('/user/login', 'MemberController@index')->name('frontend.login');
    Route::post('/user/login', 'MemberController@login')->name('frontend.login');

    Route::get('/user/register', 'MemberController@create')->name('frontend.register');
    Route::post('/user/register', 'MemberController@store')->name('frontend.register.store');

    Route::get('/user/logout', 'MemberController@logout')->name('frontend.logout');
});



Auth::routes();

Route::group([
    'namespace' => 'Admin',
    'prefix'=>'admin'
], 
function(){
    Route::get('/dashboard', 'DashboardController@index')->name('admin.home');
    Route::get('/profile', 'UsersController@index')->name('admin.profile');
    Route::post('/profile', 'UsersController@update')->name('admin.profile');
    //Admin Country
    Route::get('/country', 'CountryController@index')->name('admin.country');
    Route::get('/country/add', 'CountryController@create')->name('admin.createcountry');
    Route::post('/country/add', 'CountryController@store')->name('admin.storecountry');
    Route::get('/country/delete/{id}', 'CountryController@destroy')->name('admin.destroycountry');
   //Admin blog 
    Route::get('/blog', 'BlogController@index')->name('admin.blog');
    Route::get('/blog/add', 'BlogController@create')->name('admin.createblog');
    Route::post('/blog/add', 'BlogController@store')->name('admin.storeblog');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('admin.editblog');
    Route::post('/blog/edit/{id}', 'BlogController@update')->name('admin.updateblog');
    Route::get('/blog/delete/{id}', 'BlogController@destroy')->name('admin.destroyblog');
});

