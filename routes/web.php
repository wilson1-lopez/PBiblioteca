<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('user', 'UserController');
Route::get('dataTableUSer', 'UserController@dataTable')->name('dataTableUser');

Route::resource('roles', 'RolesController');
Route::get('dataTableRoles', 'RolesController@dataTable')->name('dataTableRoles');

Route::resource('libro', 'LibroController');
Route::resource('pais', 'PaisController');
Route::get('dataTableLibro', 'LibroController@dataTable')->name('dataTableLibro');
Route::get('dataTablePais', 'PaisController@dataTable')->name('dataTablePais');
Route::resource('editorial', 'EditorialController');
Route::get('dataTableEditorial', 'EditorialController@dataTable')->name('dataTableEditorial');
Route::resource('autor', 'AutorController');
Route::get('dataTableAutor', 'AutorController@dataTable')->name('dataTableAutor');
Route::resource('area', 'AreaController');
Route::get('dataTableArea', 'AreaController@dataTable')->name('dataTableArea');