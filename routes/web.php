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

//Front Route
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();

Route::namespace('Admin')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::prefix('admin')->group(function () {
            Route::get('/', 'DashboardController@index');
            Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');

            //Projects
            Route::get('posts', 'ProjectsController@index')->name('posts.list');
            Route::get('posts/create', 'ProjectsController@create')->name('posts.create');
            Route::post('posts/store', 'ProjectsController@store')->name('posts.store');
            Route::get('posts/{id}/edit', 'ProjectsController@edit')->name('posts.edit');
            Route::post('posts/{id}/update', 'ProjectsController@update')->name('posts.update');
            Route::get('posts/{id}/delete', 'ProjectsController@destroy')->name('posts.destroy');
            //view-image
            //add image
            //delete image

            //Menu
            // Route::get('menu', 'MenuController@index')->name('menu.list');
            
            //Categories
            Route::get('categories', 'CategoriesController@index')->name('categories.list');
            Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
            Route::post('categories/store', 'CategoriesController@store')->name('categories.store');
            Route::get('categories/{id}/edit', 'CategoriesController@edit')->name('categories.edit');
            Route::post('categories/{id}/update', 'CategoriesController@update')->name('categories.update');
            Route::get('categories/{id}/delete', 'CategoriesController@destroy')->name('categories.destroy');

            //Pages
            Route::get('pages', 'PagesController@index')->name('pages.list');
            //Settings
            Route::get('settings', 'SettingController@index')->name('admin.settings');
        });
    });
});
