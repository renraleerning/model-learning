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

Auth::routes();

//user login
Route::get('/', 'Auth\LoginController@index')->name('login');
Route::post('/', 'Auth\LoginController@login')->name('user.login.submit');

//user logout
Route::post('/logout', 'Auth\LoginController@userLogout')->name('user.logout');

//user register
Route::get('/register', 'SiswaRegisterController@index')->name('siswa.register');
Route::post('/register', 'SiswaRegisterController@register')->name('siswa.register.submit');

//siswa page
Route::get('/dashboard', 'SiswaController@index')->name('dashboard');
Route::get('/materi', 'SiswaController@showMateriView')->name('materi');

//guru page
Route::get('/guru-dashboard', 'GuruController@index')->name('guru.dashboard');

//materi ddl
Route::get('/materi/ddl/{page}', 'SiswaController@materiDDL');

//rangkum ddl
Route::get('/rangkum/ddl', 'SiswaController@showRangkumDDL')->name('rangkum.ddl');
Route::post('/rangkum/ddl/{materi}', 'fileUploadController@upload');
//revisi rangkuman
Route::post('/rangkum-revisi/ddl/{id_rangkum}', 'fileUploadController@uploadRevisi');

//nanya ddl
Route::get('/tanya/ddl', 'SiswaController@showTanyaDDL')->name('tanya.ddl');
Route::post('/tanya/ddl/{materi}', 'fileUploadController@uploadPertanyaan');
//revisi tanya ddl
Route::post('/tanya-revisi/ddl/{id_rangkum}', 'fileUploadController@uploadRevisiPertanyaan');

//prediksi
Route::get('/prediksi/ddl', 'SiswaController@showPrediksiDDL')->name('prediksi.ddl');
Route::post('/prediksi/ddl/{materi}', 'fileUploadController@uploadPrediksi');
//revisi prediksi ddl
Route::post('/prediksi-revisi/ddl/{id_rangkum}', 'fileUploadController@uploadRevisiPrediksi');

//materi dml
Route::get('/materi/dml/{page}', 'SiswaController@materiDML');

//rangkum dml
Route::get('/rangkum/dml', 'SiswaController@showRangkumDML')->name('rangkum.dml');
Route::post('/rangkum/dml/{materi}', 'fileUploadController@upload');
//revisi rangkuman
Route::post('/rangkum-revisi/dml/{id_rangkum}', 'fileUploadController@uploadRevisi');

//nanya dml
Route::get('/tanya/dml', 'SiswaController@showTanyaDML')->name('tanya.dml');
Route::post('/tanya/dml/{materi}', 'fileUploadController@uploadPertanyaan');
//revisi tanya dml
Route::post('/tanya-revisi/dml/{id_rangkum}', 'fileUploadController@uploadRevisiPertanyaan');

//prediksi
Route::get('/prediksi/dml', 'SiswaController@showPrediksiDML')->name('prediksi.dml');
Route::post('/prediksi/dml/{materi}', 'fileUploadController@uploadPrediksi');
//revisi prediksi dml
Route::post('/prediksi-revisi/dml/{id_rangkum}', 'fileUploadController@uploadRevisiPrediksi');


//laporan rangkuman ddl
Route::get('/report-rangkuman/ddl', 'GuruController@showRangkumanDDL')
    ->name('report.rangkuman.ddl');
Route::post('/report-rangkuman/ddl/{id}', 'GuruController@reportRangkuman');

//laporan rangkuman dml
Route::get('/report-rangkuman/dml', 'GuruController@showRangkumanDML')
    ->name('report.rangkuman.dml');
Route::post('/report-rangkuman/dml/{id}', 'GuruController@reportRangkuman');

//laporan pertanyaan ddl
Route::get('/report-pertanyaan/ddl', 'GuruController@showPertanyaanDDL')
    ->name('report.pertanyaan.ddl');
Route::post('/report-pertanyaan/ddl/{id}', 'GuruController@reportPertanyaan');

//laporan pertanyaan dml
Route::get('/report-pertanyaan/dml', 'GuruController@showPertanyaanDML')
    ->name('report.pertanyaan.dml');
Route::post('/report-pertanyaan/dml/{id}', 'GuruController@reportPertanyaan');

//laporan prediksi ddl
Route::get('/report-prediksi/ddl', 'GuruController@showPrediksiDDL')
    ->name('report.prediksi.ddl');
Route::post('/report-prediksi/ddl/{id}', 'GuruController@reportPrediksi');

//laporan prediksi dml
Route::get('/report-prediksi/dml', 'GuruController@showPrediksiDML')
    ->name('report.prediksi.dml');
Route::post('/report-prediksi/dml/{id}', 'GuruController@reportPrediksi');

//route flow
Route::get('/materi/ddl/5/cek', 'checkFlowController@Flow')
    ->name('materi.ddl.done');

Route::get('/materi/dml/2/cek', 'checkFlowController@FlowDML')
    ->name('materi.dml.done');
