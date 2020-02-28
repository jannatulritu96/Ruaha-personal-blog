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
*/
Auth::routes();

Route::get('login', function () {
    return redirect()->route('dashboard');
});

// Change Password
Route::get('password-change', 'DashboardController@showResetForm')->name('password.change');
Route::post('password-update', 'DashboardController@updatepassword')->name('update.password');

Auth::routes([
    'register' => false,
]);

Route::get('/','FrontendController@index')->name('home');

Route::middleware('auth')->group(function (){
    // Dashboard
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    // Category route
    Route::resource('category','CategoryController');
    Route::post('/category/change-activity/{id}', 'CategoryController@changeActivity')->name('category.change-activity');
    // Post route
    Route::resource('post','PostController');
    Route::post('/post/change-activity/{id}', 'PostController@changeActivity')->name('post.change-activity');
    //Author route
    Route::resource('user','UserController');
    Route::post('/user/change-activity/{id}', 'UserController@changeActivity')->name('user.change-activity');

});

//contact us
Route::get('contact','FrontendController@contact')->name('contact');

//about me
Route::get('about','FrontendController@about')->name('about');

// slider me
Route::get('slider','FrontendController@slider')->name('slider');

// category_post me
Route::get('category_post/{category_id}','FrontendController@category_post')->name('category.post');

// posts me
Route::get('posts/{category_id}','FrontendController@posts')->name('posts');

// details me
Route::get('details/{post_id}','FrontendController@details')->name('details');
