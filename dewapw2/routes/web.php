<?php

use App\Http\Controllers\FakulitasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
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

// Admin
Route::middleware(['auth', 'checkRole:A'])->group(function () {
    Route::resource('fakulitas', FakulitasController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});

//User
Route::middleware(['auth', 'checkRole:U'])->group(function () {
    Route::get('/fakulitas', [FakulitasController::class, 'index'])->name('fakulitas.index');
    Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
});



// Route::get('/fakulitas', function () {
//     return view('fakulitas');
// });
// Route::resource(
//     'fakulitas',
//     FakulitasController::class
// );

// Route::get('/prodi', function () {
//     return view('prodi');
// });

// Route::get('/mahasiswa', function () {
//     $data = [
//         ["npm" => 2226250101, "nama" => "Dewa"],
//         ["npm" => 2226250100, "nama" => "Reno"]
//     ];
//     return view('mahasiswa.index')->with('mahasiswa', $data);
// });


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(['checkRole:A,U'])->name('home');
