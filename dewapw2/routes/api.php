<?php

use App\Http\Controllers\API\AuthController;
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
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('fakulitas', [FakulitasController::class, 'index']);
Route::middleware(['auth:sanctum', 'ability:read-fakultas'])->get('fakultas', [FakulitasController::class, 'index']);
Route::middleware(['auth:sanctum', 'ability:create-fakultas'])->post('fakultas', [FakulitasController::class, 'store']);
Route::middleware(['auth:sanctum', 'ability:update-fakultas'])->patch('fakultas/{id}', [FakulitasController::class, 'update']);
Route::middleware(['auth:sanctum', 'ability:delete-fakultas'])->delete('fakultas/{id}', [FakulitasController::class, 'destroy']);

//Route get
// Route::get('fakulitas', [FakulitasController::class, 'index']);

Route::get('prodi', [ProdiController::class, 'index']);

Route::get('mahasiswa', [MahasiswaController::class, 'index']);
//Route Update
Route::patch('fakulitas/{id}', [FakulitasController::class, 'update']);
Route::patch('prodi/{id}', [ProdiController::class, 'update']);


//Route Delete
Route::delete('fakulitas/{id}', [FakulitasController::class, 'destroy']);
Route::delete('prodi/{id}', [ProdiController::class, 'destroy']);

//Route Post
Route::post('fakulitas', [FakulitasController::class, 'store']);

Route::post('prodi', [ProdiController::class, 'store']);

Route::post('mahasiswa', [MahasiswaController::class, 'store']);




