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



        // check not login for form login
    Route::group(['middleware' => 'memberNotLogin'], function () {
        Route::get('/user/login', 'MemberController@index')->name('frontend.login');
        Route::post('/user/login', 'MemberController@login')->name('frontend.login');
    
        Route::get('/user/register', 'MemberController@create')->name('frontend.register');
        Route::post('/user/register', 'MemberController@store')->name('frontend.register.store');
    });

    Route::group(['middleware' => 'member'], function() {
        //member
        Route::get('/account', 'MemberController@edit')->middleware('auth')->name('frontend.account');
        Route::post('/account', 'MemberController@update')->name('frontend.account.update');
        Route::get('/user/logout', 'MemberController@logout')->name('frontend.logout');

        //product
        Route::get('/product', 'ProductController@index')->name('frontend.product');
        Route::get('/product/add', 'ProductController@create')->name('frontend.product.create');
        Route::post('/product/add', 'ProductController@store')->name('frontend.product.store');
        Route::get('/product/edit/{id}', 'ProductController@edit')->name('frontend.product.edit');
        Route::post('/product/edit/{id}', 'ProductController@update')->name('frontend.product.update');
        Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('frontend.product.destroy');

        //blog rate va comment
        Route::post('/blog/rate', 'BlogController@rate')->name('frontend.blog.rate');
        Route::post('/blog/comment','BlogController@comment')->name('frontend.blog.comment');
       
    });


    Route::get('/product-{id}-{slug}', 'ProductController@details')->name('frontend.product.details');
    Route::get('/product/brand/{id}','ProductController@productBrand')->name('frontend.product.getBrand');
    Route::get('/product/category/{id}','ProductController@productCategory')->name('frontend.product.getCategory');


    Route::post('/product', 'CartController@store')->name('frontend.product.addtocart');
    Route::get('/cart', 'CartController@show')->name('frontend.cart');
    Route::post('/cart', 'CartController@update')->name('frontend.cart.update');
    Route::get('/order', 'MailController@order')->name('frontend.cart.order');
    Route::POST('/order', 'MailController@sendMail')->name('frontend.cart.store');

    Route::GET('/ajaxPriceRange', 'HomeController@SearchProductByPrice');
    Route::GET('/search', 'HomeController@SearchProduct');
    
    Route::get('/send-mail', 'MailController@sendMail')->name('frontend.testmail');
    Route::get('/order-succes', 'MailController@done')->name('frontend.mail.done');


    Route::get('/', 'HomeController@index')->name('home');

    
});



Auth::routes();

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Auth',

], function () {
    Route::get('/', 'LoginController@showLoginForm');
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', 'LoginController@logout');
});

Route::group([
    'namespace' => 'Admin',
    'prefix'=>'admin',
    'middleware' => ['admin']
], 
function(){

    
    Route::get('/dashboard', 'DashboardController@index')->name('admin.home');
    Route::get('/profile', 'UsersController@index')->name('admin.profile');
    Route::post('/profile', 'UsersController@update')->name('admin.profile');

    Route::get('/user','UsersController@show')->name('admin.user');
    // Route::get('/user/destroy/{id}','UsersController@destroy')->name('admin.user.destroy');
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
    //Admin Product
    Route::get('/product','ProductController@index')->name('admin.product');
    Route::get('/product/view/{id}','ProductController@show')->name('admin.product.view');
    Route::post('/product/view/{id}','ProductController@activeProduct')->name('admin.product.active');
    Route::get('/product/delete/{id}','ProductController@deleteProduct')->name('admin.destroyproduct');
   //Admin blog 
    Route::get('/blog', 'BlogController@index')->name('admin.blog');
    Route::get('/blog/add', 'BlogController@create')->name('admin.createblog');
    Route::post('/blog/add', 'BlogController@store')->name('admin.storeblog');
    Route::get('/blog/edit/{id}', 'BlogController@edit')->name('admin.editblog');
    Route::post('/blog/edit/{id}', 'BlogController@update')->name('admin.updateblog');
    Route::get('/blog/delete/{id}', 'BlogController@destroy')->name('admin.destroyblog');
});


