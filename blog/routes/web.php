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
    Route::get('/blog/single/{id}','BlogController@single')->name('frontend.blogsingle');
    Route::post('/blog/rate', 'BlogController@rate')->name('frontend.blog.rate');
    Route::post('/blog/comment','BlogController@comment')->name('frontend.blog.comment');

    Route::get('/user/login', 'MemberController@index')->name('frontend.login');
    Route::post('/user/login', 'MemberController@login')->name('frontend.login');

    Route::get('/user/register', 'MemberController@create')->name('frontend.register');
    Route::post('/user/register', 'MemberController@store')->name('frontend.register.store');

    Route::get('/account', 'MemberController@edit')->middleware('auth')->name('frontend.account');
    Route::post('/account', 'MemberController@update')->name('frontend.account.update');

    Route::get('/product', 'ProductController@index')->name('frontend.product');
    Route::get('/product/add', 'ProductController@create')->name('frontend.product.create');
    Route::post('/product/add', 'ProductController@store')->name('frontend.product.store');
    Route::get('/product/edit/{id}', 'ProductController@edit')->name('frontend.product.edit');
    Route::post('/product/edit/{id}', 'ProductController@update')->name('frontend.product.update');
    Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('frontend.product.destroy');

    Route::get('/', 'HomeController@index')->name('home');

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
    //Admin Category
    Route::get('category', 'CategoryController@index')->name('admin.category');
    Route::get('/category/add', 'CategoryController@create')->name('admin.createcategory');
    Route::post('/category/add', 'CategoryController@store')->name('admin.storecategory');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('admin.destroycategory');
    //Admin Brand
    Route::get('brand', 'BrandController@index')->name('admin.brand');
    Route::get('/brand/add', 'BrandController@create')->name('admin.createbrand');
    Route::post('/brand/add', 'BrandController@store')->name('admin.storebrand');
    Route::get('/brand/delete/{id}', 'BrandController@destroy')->name('admin.destroybrand');
   //Admin blog 
    Route::get('/blog', 'BlogController@index')->name('admin.blog');
    Route::get('/blog/add', 'BlogController@create')->name('admin.createblog');
    Route::post('/blog/add', 'BlogController@store')->name('admin.storeblog');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('admin.editblog');
    Route::post('/blog/edit/{id}', 'BlogController@update')->name('admin.updateblog');
    Route::get('/blog/delete/{id}', 'BlogController@destroy')->name('admin.destroyblog');
});

Route::group([
    'prefix'=>'api',
    'namespace' => 'frontend',
],
function(){
    Route::get('/blog/{id}', 'BlogController@demoApi')->name('frontend.blog.api');

});
