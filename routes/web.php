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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::namespace('App\Http\Controllers\Front')->group(function () {
    Route::get('/', 'IndexController@index');
    Route::match(['get', 'post'], '/contact', 'IndexController@contact');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function (){
    Route::match(['post', 'get'],'/login',  'AdminController@login');
    Route::group(['middleware' => ['admin']],function (){
        Route::get('/dashboard',  'AdminController@dashboard');
        Route::get('/logout',  'AdminController@logout');
        Route::get('/settings',  'AdminController@settings');
        Route::post('/check-current-pwd', 'AdminController@checkCurrentPassword');
        Route::post('/update-pwd', 'AdminController@updateCurrentPassword');
        Route::match(['get', 'post'], '/update-admin-details', 'AdminController@updateAdminDetails');

        // project route
        Route::match(['get', 'post'], '/add-project', 'ProjectsController@addProject');
        Route::get('/view-projects', 'ProjectsController@viewProject');
        Route::get('/update-project-status', 'ProjectsController@updateProjectStatus');
        Route::get('/delete-project/{id}', 'ProjectsController@deleteProject');
        Route::match(['get', 'post'],'/edit-project/{id}', 'ProjectsController@editProject');

        // Team Details
        Route::match(['get', 'post'], '/add-team', 'AuthorController@addTeam');
        Route::get('/view-team', 'AuthorController@viewTeam');
        Route::get('/update-team-status', 'AuthorController@updateTeamStatus');
        Route::get('/delete-team/{id}', 'AuthorController@deleteTeam');
        Route::match(['get', 'post'],'/edit-team/{id}', 'AuthorController@editTeam');

    });
});
