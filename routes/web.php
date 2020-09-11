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
Route::resource('editorial', 'EditorialController');
Route::resource('area', 'AreaController');
Route::resource('tipo_libro', 'Tipo_libroController');
Route::rRoute::resource('libroexistencia', 'LibroexistenciaController');
Route::resource('libro', 'LibroController');