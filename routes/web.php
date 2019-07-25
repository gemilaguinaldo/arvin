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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/getdata', 'HomeController@getStats')->name('get.data');

Route::middleware(['auth'])->group(function(){
    Route::post('/changepassword', 'UserController@changePassword')->name('user.changepassword');
    Route::resource('users', 'UserController')->except([
        'create', 'edit'
    ]);
    Route::resource('roles', 'RoleController')->except([
        'create', 'edit'
    ]);
    Route::resource('expenses/categories', 'ExpenseCategoryController')->except([
        'create', 'edit'
    ]);
    Route::resource('expenses', 'ExpenseController')->except([
        'create', 'edit'
    ]);
});