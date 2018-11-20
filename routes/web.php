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

            //CKeditor Project // Globals
            Route::post('image/upload', 'ProjectsController@ckupload');
            Route::get('image/browser', 'ProjectsController@ckbrowser');

            //Projects
            Route::get('posts', 'ProjectsController@index')->name('posts.list');
            Route::get('posts/create', 'ProjectsController@create')->name('posts.create');
            
            //Images Project
            Route::get('posts/{id}/images', 'ProjectsController@images')->name('posts.images');
            Route::post('posts/{id}/images/upload', 'ProjectsController@upload')->name('posts.images.upload');
            Route::get('posts/{idProject}/images/{idImage}/delete', 'ProjectsController@destroyImage')->name('posts.images.delete');

            Route::post('posts/store', 'ProjectsController@store')->name('posts.store');
            Route::get('posts/{id}/edit', 'ProjectsController@edit')->name('posts.edit');
            Route::post('posts/{id}/update', 'ProjectsController@update')->name('posts.update');
            Route::get('posts/{id}/delete', 'ProjectsController@destroy')->name('posts.destroy');
            

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
            Route::get('pages/create', 'PagesController@create')->name('pages.create');
            Route::post('pages/store', 'PagesController@store')->name('pages.store');

            Route::get('pages/{id}/view', 'PagesController@show')->name('pages.view');

            Route::get('pages/{id}/edit', 'PagesController@edit')->name('pages.edit');
            Route::post('pages/{id}/update', 'PagesController@update')->name('pages.update');
            Route::get('pages/{id}/delete', 'PagesController@destroy')->name('pages.destroy');

            //Settings
            Route::get('settings', 'SettingController@setting')->name('admin.settings');
            Route::post('save/settings', 'SettingController@storeSetting')->name('admin.settings.store');

            //Profile
            Route::get('profile',  'SettingController@profile')->name('admin.profile');
            Route::post('save/profile', 'SettingController@storeProfile')->name('admin.profile.store');
            
            //Password
            Route::get('password',  'SettingController@password')->name('admin.profile.password');
            Route::post('save/password', 'SettingController@storePassword')->name('admin.profile.password.store');

            
        });
    });
});

Route::get('page/{slug}', 'FrontController@page')->name('front.page');