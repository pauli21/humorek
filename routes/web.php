<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
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


Route::get('/humorek.pl', [ImageController::class, 'index']);
Route::get('humorek.pl/imageshow/{image}', [ImageController::class, 'showImage']);
Route::get('humorek.pl/login', [LoginController::class, 'showLoginForm']);
//Route::post('/login', [LoginController::class, 'authenticate']);

/*Route::get('/add/show/{image}', [ImageController::class, 'addImage']); */
