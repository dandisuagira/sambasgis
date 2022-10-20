<?php

use App\Http\Controllers\API\DesaController;
use App\Http\Controllers\API\DusunController;
use App\Http\Controllers\API\IdmController;
use App\Http\Controllers\API\KawasanController;
use App\Http\Controllers\API\LakesController;
use App\Http\Controllers\API\PendudukController;
use App\Http\Controllers\API\KesehatanController;
use App\Http\Controllers\API\ProyekController;
use App\Http\Controllers\API\StuntingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//DESA API
Route::get('desa', [DesaController::class, 'index']); //desa index
Route::post('desa/store', [DesaController::class, 'store']); //desa store
Route::get('desa/show/{kode_desa}', [DesaController::class, 'show']); //desa show
Route::post('desa/update/{kode_desa}', [DesaController::class, 'update']); //desa update
Route::delete('desa/destroy/{kode_desa}', [DesaController::class, 'destroy']); //desa destroy

//DUSUN API
Route::get('dusun', [DusunController::class, 'index']); //dusun index
Route::post('dusun/store', [DusunController::class, 'store']); //dusun store
Route::get('dusun/show/{id}', [DusunController::class, 'show']); //dusun show
Route::post('dusun/update/{id}', [DusunController::class, 'update']); //dusun update
Route::delete('dusun/destroy/{id}', [DusunController::class, 'destroy']); //dusun destroy

//LAKES API DI KESEHATAN CONTROLLER
Route::get('lakes', [KesehatanController::class, 'indexLakes']); //lakes index
Route::post('lakes/store', [KesehatanController::class, 'storeLakes']); //lakes store
Route::get('lakes/show/{id}', [KesehatanController::class, 'showLakes']); //lakes show
Route::post('lakes/update/{id}', [KesehatanController::class, 'updateLakes']); //lakes update
Route::delete('lakes/destroy/{id}', [KesehatanController::class, 'destroyLakes']); //lakes destroy
//PUSKESMAS API DI KESEHATAN CONTROLLER
Route::get('puskesmas', [KesehatanController::class, 'indexPuskesmas']); //Puskesmas index
Route::post('puskesmas/store', [KesehatanController::class, 'storePuskesmas']); //Puskesmas store
Route::get('puskesmas/show/{id}', [KesehatanController::class, 'showPuskesmas']); //Puskesmas show
Route::post('puskesmas/update/{id}', [KesehatanController::class, 'updatePuskesmas']); //Puskesmas update
Route::delete('puskesmas/destroy/{id}', [KesehatanController::class, 'destroyPuskesmas']); //Puskesmas destroy

//PENDUDUK API
Route::get('penduduk', [PendudukController::class, 'index']); //penduduk index
Route::post('penduduk/store', [PendudukController::class, 'store']); //penduduk store
Route::get('penduduk/show/{id}', [PendudukController::class, 'show']); //penduduk show
Route::post('penduduk/update/{id}', [PendudukController::class, 'update']); //penduduk update
Route::delete('penduduk/destroy/{id}', [PendudukController::class, 'destroy']); //penduduk destroy

//STUNTING API
Route::get('stunting', [StuntingController::class, 'index']); //stunting index
Route::post('stunting/store', [StuntingController::class, 'store']); //stunting store
Route::get('stunting/show/{id}', [StuntingController::class, 'show']); //stunting show
Route::post('stunting/update/{id}', [StuntingController::class, 'update']); //stunting update
Route::delete('stunting/destroy/{id}', [StuntingController::class, 'destroy']); //stunting destroy

//KAWASAN API
Route::get('kawasan', [KawasanController::class, 'index']); //kawasan index
Route::post('kawasan/store', [KawasanController::class, 'store']); //kawasan store
Route::get('kawasan/show/{id}', [KawasanController::class, 'show']); //kawasan show
Route::post('kawasan/update/{id}', [KawasanController::class, 'update']); //kawasan update
Route::delete('kawasan/destroy/{id}', [KawasanController::class, 'destroy']); //kawasan destroy

//IDM API
Route::get('idm', [IdmController::class, 'index']); //idm index
Route::post('idm/store', [IdmController::class, 'store']); //idm store
Route::get('idm/show/{id}', [IdmController::class, 'show']); //idm show
Route::post('idm/update/{id}', [IdmController::class, 'update']); //idm update
Route::delete('idm/destroy/{id}', [IdmController::class, 'destroy']); //idm destroy

//PROYEK API
Route::get('proyek', [ProyekController::class, 'index']); //proyek index
Route::post('proyek/store', [ProyekController::class, 'store']); //proyek store
Route::get('proyek/show/{id}', [ProyekController::class, 'show']); //proyek show
Route::post('proyek/update/{id}', [ProyekController::class, 'update']); //proyek update
Route::delete('proyek/destroy/{id}', [ProyekController::class, 'destroy']); //proyek destroy
//resource desa api 
// Route::apiResource('desa', DesaController::class);       


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
