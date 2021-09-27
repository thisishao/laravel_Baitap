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

