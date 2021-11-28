<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();



Route::middleware('auth')->group(function () {

    Route::prefix('dashboard')->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('category', 'CategoryController');
        Route::resource('problem', 'ProblemController');
        Route::resource('article', 'ArticleController');
        Route::resource('article-category', 'ArticleCategoryController');
        /* contributor */
        Route::get('/contributor','ContributorController@index');
        Route::get('/contributor/create','ContributorController@create');
        Route::post('/contributor/create','ContributorController@store');
        Route::get('/contributor/{id}/edit','ContributorController@edit');
        Route::get('/contributor/{id}/delete','ContributorController@destory');
        /* Blog  Category */
        Route::get("/blog-category","BlogCategoryController@index");
        Route::post("/blog-category/create","BlogCategoryController@create");
        Route::post('/blog-category/{id}/delete','BlogCategoryController@destory');
        Route::get('/blog-category/{id}/edit','BlogCategoryController@edit');
        Route::post("/blog-category/{id}/upgrade",'BlogCategoryController@upgrade');
        /* Blog */
        Route::get("/blogs","BlogController@index");
        Route::get("/blog/create","BlogController@create");
        Route::post("/blog/create","BlogController@store");
        Route::get("/blogs/{id}/edit","BlogController@edit");
        Route::get("/blogs/{id}/show","BlogController@show");
        Route::post("/blogs/{id}/edit","BlogController@upgrade");
        Route::post("/blog/{id}/delete","BlogController@delete");
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', 'ProfileController@profile')->name('profile');
        Route::get('/edit-profile', 'ProfileController@editProfile')->name('profile.editProfile');
        Route::get('/change-password', 'ProfileController@changePassword')->name('profile.changePassword');

        Route::post('/change-name-email', 'ProfileController@changeNameEmail')->name('profile.changeNameEmail');
        Route::post('/update-photo', 'ProfileController@updatePhoto')->name('profile.updatePhoto');
        Route::post('/update-password', 'ProfileController@updatePassword')->name('profile.updatePassword');
    });
});
