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
    //return 555;
    return view('welcome');
});

Route::view('issues', 'issues.index');

Route::post('issues/store', 'IssuesController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('services', 'services');

Route::get('custom/login', 'CustomAuthController@login');

Route::get('custom/login/{id}', 'CustomAuthController@Customlogin');

Route::get('issues/list', 'IssuesController@list');
Route::post('issues/import', 'IssuesController@importFromExcel');
Route::view('issues-form', 'excel-import');

Route::get('users', 'UsersController@export');
