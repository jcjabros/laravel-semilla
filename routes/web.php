<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
Route::get('/dashboard/categories', 'DashboardController@categories')->name('Categories');
Route::get('/dashboard/products', 'DashboardController@products')->name('Products');
Route::get('/dashboard/posts', 'DashboardController@posts')->name('Posts');
Route::get('/dashboard/users', 'DashboardController@users')->name('Users');
Route::get('/dashboard/sliders', 'DashboardController@slider')->name('Sliders');
Route::get('/dashboard/beforenafter', 'DashboardController@before_n_after')->name('BeforenAfter');
Route::get('/dashboard/subscribers', 'DashboardController@subscribers')->name('Subscribers');
Route::resource('posts','PostsController');
Route::resource('catalog', 'PCategoriesController');
Route::resource('product', 'ProductController');
Route::get('/changePassword','Auth\ChangePasswordController@showChangePasswordForm');
Route::post('/changePassword','Auth\ChangePasswordController@changePassword')->name('changePassword');
Route::post('/subscribe','SubscribersController@postSubscribeAjax');
Route::delete('/subscribe/{subscriber_id}','SubscribersController@delete');
Route::delete('/auth_delete/{auth_id}','Auth\DestroyController@delete');
Route::post('/homeSlider/create', 'HomeSliderController@store');
Route::post('/homeSlider/{slider_id}', 'HomeSliderController@update');
Route::post('/BeforenAfter/create', 'BeforenAfterController@store');
Route::delete('/BeforenAfter_delete/{bna_id}','BeforenAfterController@destroy');
Route::post('/contact','ContactController@submit');
Route::get('/beforenafter', 'BeforenAfterController@show')->name('beforenafter');
Auth::routes();