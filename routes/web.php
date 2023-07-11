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



Route::get('login', 'App\Http\Controllers\AuthController@login')->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@postlogin');
Route::get('logout', 'App\Http\Controllers\AuthController@logout');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('dashboard', 'App\Http\Controllers\DashboardController@index');
    Route::get('presensi', 'App\Http\Controllers\PresensiController@index');
    Route::get('siswa','App\Http\Controllers\siswaController@index');
    Route::get('siswa/create','App\Http\Controllers\siswaController@create');
    Route::post('siswa/store','App\Http\Controllers\siswaController@store');
    Route::get('siswa/edit/{nim}','App\Http\Controllers\siswaController@edit');
    Route::patch('siswa/{nim}','App\Http\Controllers\siswaController@editProcess');
    Route::get('siswa/delete/{nim}','App\Http\Controllers\siswaController@delete');
    Route::get('siswa/exportexcel','App\Http\Controllers\siswaController@exportexcel');
    Route::post('siswa/importexcel','App\Http\Controllers\siswaController@importexcel');
    Route::get('siswa/exportpdf','App\Http\Controllers\siswaController@exportpdf');

    Route::get('userfinger','App\Http\Controllers\userfingerController@index');
    Route::post('userfinger/tarik','App\Http\Controllers\userfingerController@tarik');
    Route::get('userfinger/delete/{id}','App\Http\Controllers\userfingerController@delete');

    Route::get('fingerprint','App\Http\Controllers\FingerprintController@index');
    Route::post('fingerprint/tarik','App\Http\Controllers\FingerprintController@tarik');
    Route::post('fingerprint/filter', 'App\Http\Controllers\FingerprintController@filter');



    Route::get('fingerprint/delete/{id}','App\Http\Controllers\FingerprintController@delete');
    Route::get('rekap','App\Http\Controllers\RekapController@index');
    Route::get('rekapsiswa','App\Http\Controllers\rekapsiswaController@index');
    Route::get('rekapsiswa/export','App\Http\Controllers\rekapsiswaController@export');
    Route::get('rekapsiswa/getData','App\Http\Controllers\rekapsiswaController@getData');
    Route::post('rekapsiswa/saveData','App\Http\Controllers\rekapsiswaController@saveData');
    Route::post('rekapsiswa/updateStatus','App\Http\Controllers\rekapsiswaController@updateStatus');
    Route::get('/rekapsiswa/{id}/edit', 'App\Http\Controllers\RekapSiswaController@edit');



    Route::get('rekap/export-pdf','App\Http\Controllers\RekapController@exportPDF');
    Route::get('rekap/exportPdfByName','App\Http\Controllers\RekapController@exportPdfByName');

    Route::get('perizinan','App\Http\Controllers\perizinanController@index');
    Route::post('perizinan/store','App\Http\Controllers\perizinanController@store');
});


