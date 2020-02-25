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

use App\Http\Controllers\EmployeesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company', 'HomeController@index')->name('home');

Route::get('/company/create', 'CompanyController@create');
Route::post('/company', 'CompanyController@store');

Route::delete('/company/{company}', 'CompanyController@destroy')->name('company.destroy');

Route::get('/company/{company}/edit', 'CompanyController@edit')->name('company.edit');
Route::patch('/company/{company}', 'CompanyController@update')->name('company.update');

Route::get('/company/{company}', 'CompanyController@show')->name('company.show');

Route::get('/{company}/employee/create', 'EmployeesController@create')->name('employees.create');
Route::post('/{company}/employee', 'EmployeesController@store')->name('employees.store');

Route::get('/employee/{employee}/edit', 'EmployeesController@edit')->name('employees.edit');
Route::patch('/employee/{employee}', 'EmployeesController@update')->name('employees.update');

Route::delete('/employee/{employee}', 'EmployeesController@destroy')->name('employee.destroy');


