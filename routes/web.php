<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MajorController;

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

Route::get('/', [MajorController::class, 'index'])->name('index');
Route::post('/', [MajorController::class, 'result'])->name('result');
Route::get('/all', [MajorController::class, 'show'])->name('show');