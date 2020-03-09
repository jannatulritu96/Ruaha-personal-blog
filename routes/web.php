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

//Route::get('login', function () {
//    return redirect()->route('dashboard');
//});

// Change Password
Route::GET('password-change', 'DashboardController@showResetForm')->name('password.change');
Route::POST('password-update', 'DashboardController@updatepassword')->name('update.password');

Auth::routes([
    'register' => true,
]);

Route::GET('/','FrontendController@index')->name('home');

Route::middleware('auth')->group(function (){
    // Dashboard
    Route::GET('dashboard','DashboardController@index')->name('dashboard');

    // Category route
    Route::resource('category','CategoryController');
    Route::get('category/total_post','CategoryController@index')->name('category.total_post');
    Route::POST('/category/change-activity/{id}', 'CategoryController@changeActivity')->name('category.change-activity');

    // Sub Category route
    Route::resource('sub_category','SubCategoryController');
    Route::POST('/sub_category/change-activity/{id}', 'SubCategoryController@changeActivity')->name('sub_category.change-activity');

    // Post route
    Route::resource('post','PostController');
    Route::POST('/post/change-activity/{id}', 'PostController@changeActivity')->name('post.change-activity');
    Route::GET('/post/sub_cat/{id}', 'PostController@subCat')->name('post.sub_cat');

    // Add tags route
    Route::GET('post/tag_destroy/{id}','PostController@tagDestroy')->name('post.tag-destroy');
    Route::POST('post/addTag','PostController@addTag')->name('post.addTag');
    Route::GET('post/tag-post','PostController@index')->name('post.tag_post');

    // Tag route
    Route::resource('tags','TagController');
    Route::POST('/tags/change-activity/{id}', 'TagController@changeActivity')->name('tags.change-activity');

    //Author route
    Route::resource('user','UserController');
    Route::POST('/user/change-activity/{id}', 'UserController@changeActivity')->name('user.change-activity');
    Route::GET('/user/get-permission/{id}', 'UserController@Permission');
    Route::POST('/user/change-permission/{id}', 'UserController@addPermission');
    Route::POST('/user/change-decline/{id}', 'UserController@addDecline');

});

// contact us
Route::GET('contact','FrontendController@contact')->name('contact');
// mail send
Route::POST('mail','FrontendController@sendmail')->name('sendmail');

//about route
Route::GET('about','FrontendController@about')->name('about');

// slider route
Route::GET('slider','FrontendController@slider')->name('slider');

// category_post route
Route::GET('category_post/{category_id}','FrontendController@category_post')->name('category.post');

// posts route
Route::GET('posts/{id}','FrontendController@posts')->name('posts');

// details route
Route::GET('details/{post_id}','FrontendController@details')->name('details');

