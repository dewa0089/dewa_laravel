<?php

use App\Http\Controllers\API\FakulitasController;
use App\Http\Controllers\API\MahasiswaController;
use App\Http\Controllers\API\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route get
Route::get('fakulitas', [FakulitasController::class, 'index']);

Route::get('prodi', [ProdiController::class, 'index']);

Route::get('mahasiswa', [MahasiswaController::class, 'index']);

//Route Post
Route::post('fakulitas', [FakulitasController::class, 'store']);

Route::post('prodi', [ProdiController::class, 'store']);

Route::post('mahasiswa', [MahasiswaController::class, 'store']);

//Route Update
Route::patch('fakulitas/{id}', [FakulitasController::class, 'update']);
Route::patch('prodi/{id}', [ProdiController::class, 'update']);


//Route Delete
Route::delete('fakulitas/{id}', [FakulitasController::class, 'destroy']);
Route::delete('prodi/{id}', [ProdiController::class, 'destroy']);
