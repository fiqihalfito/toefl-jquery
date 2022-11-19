<?php

use App\Http\Controllers\ExamController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'index']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/register', [LoginController::class, 'makeSession']);

// Route::get('/exam', [ExamController::class, 'index']);
Route::controller(ExamController::class)->group(function () {
    Route::get('/exam/welcome', 'welcome');
    Route::get('/exam', 'index');
    // Route::post('/exam/submit', 'submit');
    Route::post('/exam/finish', 'finish');
});
