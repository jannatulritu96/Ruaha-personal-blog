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
//    Route::resource('category','CategoryController');
    Route::GET('category', 'CategoryController@index')->name('category.index');
    Route::GET('category/create', 'CategoryController@create')->name('category.create');
    Route::POST('category/store', 'CategoryController@store')->name('category.store');
    Route::GET('category/{slug_name}/edit', 'CategoryController@edit')->name('category.edit');
    Route::PUT('category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::DELETE('category/{id}','CategoryController@destroy')->name('category.destroy');
    Route::GET('category/total_post','CategoryController@index')->name('category.total_post');

    Route::POST('/category/change-activity/{id}', 'CategoryController@changeActivity')->name('category.change-activity');

    // Sub Category route
//    Route::resource('sub_category','SubCategoryController');
    Route::GET('sub_category', 'SubCategoryController@index')->name('sub_category.index');
    Route::GET('sub_category/create', 'SubCategoryController@create')->name('sub_category.create');
    Route::POST('sub_category/store', 'SubCategoryController@store')->name('sub_category.store');
    Route::GET('sub_category/{slug_name}/edit', 'SubCategoryController@edit')->name('sub_category.edit');
    Route::PUT('sub_category/update/{id}', 'SubCategoryController@update')->name('sub_category.update');
    Route::DELETE('sub_category/{id}','SubCategoryController@destroy')->name('sub_category.destroy');

    Route::POST('/sub_category/change-activity/{id}', 'SubCategoryController@changeActivity')->name('sub_category.change-activity');

    // Post route
//    Route::resource('post','PostController');
    Route::GET('post', 'PostController@index')->name('post.index');
    Route::GET('post/create', 'PostController@create')->name('post.create');
    Route::POST('post/store', 'PostController@store')->name('post.store');
    Route::GET('post/{slug_name}/edit', 'PostController@edit')->name('post.edit');
    Route::PUT('post/update/{id}', 'PostController@update')->name('post.update');
    Route::DELETE('post/{id}','PostController@destroy')->name('post.destroy');

    Route::POST('/post/change-activity/{id}', 'PostController@changeActivity')->name('post.change-activity');
    Route::GET('/post/sub_cat/{id}', 'PostController@subCat')->name('post.sub_cat');

    // Add tags route
    Route::GET('post/tag_destroy/{id}','PostController@tagDestroy')->name('post.tag-destroy');
    Route::POST('post/addTag','PostController@addTag')->name('post.addTag');
    Route::GET('post/tag-post','PostController@index')->name('post.tag_post');

    // Tag route
//    Route::resource('tags','TagController');
    Route::GET('tags', 'TagController@index')->name('tags.index');
    Route::GET('tags/create', 'TagController@create')->name('tags.create');
    Route::POST('tags/store', 'TagController@store')->name('tags.store');
    Route::GET('tags/{slug_name}/edit', 'TagController@edit')->name('tags.edit');
    Route::PUT('tags/update/{id}', 'TagController@update')->name('tags.update');
    Route::DELETE('tags/{id}','TagController@destroy')->name('tags.destroy');

    Route::POST('/tags/change-activity/{id}', 'TagController@changeActivity')->name('tags.change-activity');

    //Author route
//    Route::resource('user','UserController');
    Route::GET('user', 'UserController@index')->name('user.index');
    Route::GET('user/create', 'UserController@create')->name('user.create');
    Route::POST('user/store', 'UserController@store')->name('user.store');
    Route::GET('user/{slug_name}/edit', 'UserController@edit')->name('user.edit');
    Route::PUT('user/update/{id}', 'UserController@update')->name('user.update');
    Route::DELETE('user/{id}','UserController@destroy')->name('user.destroy');

    Route::POST('/user/change-activity/{id}', 'UserController@changeActivity')->name('user.change-activity');
    Route::GET('/user/get-permission/{id}', 'UserController@Permission');
    Route::POST('/user/change-permission/{id}', 'UserController@addPermission');
    Route::POST('/user/change-decline/{id}', 'UserController@addDecline');

});

// Contact us
Route::GET('contact','FrontendController@contact')->name('contact');
// mail send
Route::POST('mail','FrontendController@sendmail')->name('sendmail');

//about route
Route::GET('about','FrontendController@about')->name('about');

// slider route
Route::GET('slider','FrontendController@slider')->name('slider');

// category_post route
Route::GET('category_post/{slug_name}','FrontendController@category_post')->name('category.post');

// posts route
Route::GET('posts/{slug_name}','FrontendController@posts')->name('posts');

// details route
Route::GET('details/{slug_name}','FrontendController@details')->name('details');

