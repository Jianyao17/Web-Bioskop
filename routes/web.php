<?php

use App\Http\Controllers\Admin\BioskopController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmController;

use App\Http\Controllers\Admin\LaporanController;
use App\Http\Controllers\Admin\ListFilmController;
use App\Http\Controllers\Admin\PenayanganController;
use App\Http\Controllers\Admin\UserController;

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

Route::middleware('guest')->group(function() 
{
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'index']);
    
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/', HomeController::class);
Route::get('/film/{nama_film}', FilmController::class);


Route::middleware(['auth'])->group(function() 
{
    Route::get('/{admin_role}/laporan', LaporanController::class);
    Route::get('/{admin_role}/penayangan', PenayanganController::class);
    Route::get('/{admin_role}/film', ListFilmController::class);
    Route::get('/{admin_role}/teater', BioskopController::class);
});

Route::get('/users', UserController::class);