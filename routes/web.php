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

Route::get('', 'LandingpageController@home')->name('home');

Route::get('organizational-structure', 'LandingpageController@organizationalStructure')->name('organizational-structure');

Route::get('login', 'AuthController@index')->name('login');

Route::post('login', 'AuthController@authenticate');


Route::middleware(['auth'])->group(function ()
{
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::resource('dashboard', 'DashboardController')->only('index');

    Route::prefix('dashboard')->name('dashboard.')->group(function()
    {
        Route::resource('user', 'UserController');

        Route::resource('organizational-structure', 'OrganizationalStructureController')->only('index', 'show');

        Route::resource('department', 'DepartmentController');

        Route::resource('member', 'MemberController');

        Route::resource('post', 'PostController');

        Route::resource('about', 'AboutController');
    });

    Route::prefix('laravel-filemanager')->group(function ()
    {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
