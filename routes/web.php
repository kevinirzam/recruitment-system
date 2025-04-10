<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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
Route::get('/', [AuthController::class, 'index']);
Route::get('/sign-in', [AuthController::class, 'index']);
Route::post('/sign-in', [AuthController::class, 'signInHandler']);
Route::get('/sign-up', [AuthController::class, 'signUp']);
Route::post('/sign-up', [AuthController::class, 'signUpHandler']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/dashboard', [HomeController::class, 'dashboard']);
