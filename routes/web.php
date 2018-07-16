<?php


Route::get('employees','EmployeeController@index')->name('employees.index');

Route::get('employees/create','EmployeeController@create')->name('employees.create');

Route::post('employees/store', 'EmployeeController@store')->name('employees.store');

Route::get('employees/{id}/edit', 'EmployeeController@edit')->name('employees.edit');

Route::put('employees/{id}/update', 'EmployeeController@update')->name('employees.update');

Route::delete('employees/{id}/delete', 'EmployeeController@delete')->name('employees.delete');

Route::get('departments','DepartmentsController@index')->name('departments.index');

Route::get('departments/create','DepartmentsController@create')->name('departments.create');

Route::post('departments/store', 'DepartmentsController@store')->name('departments.store');

Route::get('departments/{id}/edit', 'DepartmentsController@edit')->name('departments.edit');

Route::put('departments/{id}/update', 'DepartmentsController@update')->name('departments.update');

Route::delete('departments/{id}/delete', 'DepartmentsController@delete')->name('departments.delete');

Route::get('/', 'MainController@index')->name('main.index');