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
    return view('welcome');
});

Auth::routes();

Route::get('employee', ['as' => 'employee', 'uses' => 'EmployeeController@index']);
Route::get('employee/create', ['as' => 'employee.create', 'uses' => 'EmployeeController@create']);
Route::post('employee/store', ['as' => 'employee.store', 'uses' => 'EmployeeController@store']);
Route::get('employee/edit/{employee}', ['as' => 'employee.edit', 'uses' => 'EmployeeController@edit']);
Route::patch('employee/update/{employee}', ['as' => 'employee.update', 'uses' => 'EmployeeController@update']);
Route::post('employee/attach/key/{employee}', ['as' => 'employee.attach.key', 'uses' => 'EmployeeController@attach']);
Route::get('employee/detach/key/{employee}/{key}', ['as' => 'employee.edit', 'uses' => 'EmployeeController@detach']);
Route::get('employee/{employee}/remove', ['as' => 'employee.delete', 'uses' => 'EmployeeController@destroy']);

Route::get('key', ['as' => 'key', 'uses' => 'KeysController@index']);
Route::get('key/create', ['as' => 'key.create', 'uses' => 'KeysController@create']);
Route::post('key/store', ['as' => 'key.store', 'uses' => 'KeysController@store']);
Route::get('key/edit/{key}', ['as' => 'key.edit', 'uses' => 'KeysController@edit']);
Route::patch('key/update/{key}', ['as' => 'key.update', 'uses' => 'KeysController@update']);