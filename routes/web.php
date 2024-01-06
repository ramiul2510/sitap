<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DataTargetController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('login');

Route::middleware(['auth'])->group(function () {
Route::get('/cpanel', [DataTargetController::class, 'dashboard'])->name('cpanel');



// data target 
Route::resource('/data-target', DataTargetController::class);


// data pegawai 
Route::resource('/data-pegawai', DataPegawaiController::class);


// Data User 
Route::resource('/users', UserController::class);


});


Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


