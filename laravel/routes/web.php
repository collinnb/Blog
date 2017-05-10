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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/post/{id}','PostController@show')->name('onepost');
Route::post('/post/{id}', 'CommentController@store');

Route::get('post', 'PostController@index');

Route::get('about','aboutController@index');
Route::get('Contact','ContactController@index');


Route::group(['middleware' => 'auth'], function () {
    Route::get('create', 'PostController@create');
    Route::post('create', 'PostController@store');

    Route::get('manage/post', 'userPostController@index');
    Route::get('manage/post/{id}/edit', 'userpostController@edit')->name('postedit');
    Route::get('manage/post/{id}/delete', 'userpostController@destroy')->name('postdelete');
    Route::post('manage/post/{id}/edit', 'userpostController@update');

    Route::get('manage/comment/{id}/edit', 'CommentController@edit')->name('commentedit');
    Route::get('manage/comment/{id}/delete', 'CommentController@destroy')->name('commentdelete');
    Route::post('manage/comment/{id}/edit', 'CommentController@update');

    Route::get('manage/comments','CommentController@index');

});

Route::group(['middleware' => ['auth', 'admin']], function() {
    Route::get('admin/posts','AdminPostController@index');
    Route::get('admin/comments','AdminCommentController@index');
    Route::get('admin/users','AdminUserController@index');
    Route::get('admin/users/{id}/edit', 'AdminUserController@edit')->name('Usersedit');
    Route::get('admin/users/{id}/delete', 'AdminUserController@destroy')->name('Usersdelete');
    Route::post('admin/users/{id}/edit', 'AdminUserController@update');
});



Auth::routes();

