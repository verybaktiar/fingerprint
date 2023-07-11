<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('siswa','App\Http\Controllers\siswaController@index');
Route::get('siswa/create','App\Http\Controllers\siswaController@create');
Route::post('siswa/store','App\Http\Controllers\siswaController@store');
Route::get('siswa/edit/{nim}','App\Http\Controllers\siswaController@edit');
Route::patch('siswa/{nim}','App\Http\Controllers\siswaController@editProcess');
Route::get('siswa/delete/{nim}','App\Http\Controllers\siswaController@delete');
Route::get('siswa/exportexcel','App\Http\Controllers\siswaController@exportexcel');
Route::post('siswa/importexcel','App\Http\Controllers\siswaController@importexcel');
Route::get('siswa/exportpdf','App\Http\Controllers\siswaController@exportpdf');
