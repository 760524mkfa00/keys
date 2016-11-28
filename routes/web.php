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