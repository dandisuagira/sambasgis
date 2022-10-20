<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\DusunController;
use App\Http\Controllers\KesehatanController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\StuntingController;


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
//hahahhahaha
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/master', function () {
//     return view('template_frontend.master');
// });

// Route::get('/beranda', function () {
//     return view('frontend.home');
// });

// Route::get('/tentang', function () {
//     return view('frontend.tentang');
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [App\Http\Controllers\BerandaController::class, 'tentang'])->name('tentang');
Route::get('/analisis', [App\Http\Controllers\BerandaController::class, 'analisis'])->name('analisis');

// Route::resource('keluhan', KeluhanController::class);



//kecamatan numpang di controller desa dulu
Route::get('/kecamatan_index', [App\Http\Controllers\DesaController::class, 'kecamatan'])->name('kecamatan_index'); //kecamatan peta

//1 adm desa test
Route::get('/desa_index', [App\Http\Controllers\DesaController::class, 'desa'])->name('desa_index'); //desa peta
//2 luas presentase wilayah
Route::get('/luasdesa_index', [App\Http\Controllers\DesaController::class, 'luasdesa'])->name('luasdesa_index'); //desa peta
Route::get('/chartjs', [App\Http\Controllers\DesaController::class, 'chartjs'])->name('chartjs'); //CHART js
//Route::get('/desa_index', [App\Http\Controllers\DesaController::class, 'index'])->name('desa_index'); //desa index

Route::middleware(['auth'])->group(function () {
});
//desa resource
Route::resource('desa', DesaController::class);

//dusun peta
Route::get('/dusun_index', [App\Http\Controllers\DusunController::class, 'dusun'])->name('dusun_index'); //dusun peta
//dusun resource
Route::resource('dusun', DusunController::class);

//penduduk peta
Route::get('/penduduk_index', [App\Http\Controllers\PendudukController::class, 'penduduk'])->name('penduduk_index'); //penduduk peta
Route::resource('penduduk', PendudukController::class);

//kesehatan
Route::get('/kesehatan_index', [App\Http\Controllers\KesehatanController::class, 'kesehatan'])->name('kesehatan_index'); //kesehatan peta
// Route::resource('kesehatan', KesehatanController::class); blm dipakai


//LAKES (Layanan Kesehatan untuk geoserver layanan kesehatan)
Route::get('/lakes/{lakes}/edit', [App\Http\Controllers\KesehatanController::class, 'editLakes'])->name('editLakes'); //edit layanan kesehatan
Route::get('/lakes/{lakes}', [App\Http\Controllers\KesehatanController::class, 'showLakes'])->name('showLakes'); //show layanan kesehatan


//PUSKESMAS(puskesmas geoserver)
Route::get('/puskesmas/{puskesmas}', [App\Http\Controllers\KesehatanController::class, 'showPuskesmas'])->name('showPuskesmas'); //show puskesmas
Route::get('/puskesmas/{puskesmas}/edit', [App\Http\Controllers\KesehatanController::class, 'editPuskesmas'])->name('editPuskesmas'); //edit puskesmas


//pendidikan
Route::get('/pendidikan_index', [App\Http\Controllers\PendidikanController::class, 'pendidikan'])->name('pendidikan_index'); //kesehatan peta

//stunting
Route::resource('stunting', StuntingController::class);
Route::get('/stunting_index', [App\Http\Controllers\StuntingController::class, 'stunting'])->name('stunting_index'); //stunting peta

//kawasan
Route::get('/kawasan_index', [App\Http\Controllers\KawasanController::class, 'kawasan'])->name('kawasan_index'); //kawasan peta

//Idm
Route::get('/idm_index', [App\Http\Controllers\IdmController::class, 'idm'])->name('idm_index'); //idm peta

//proyek resource
Route::resource('proyek', ProyekController::class);
