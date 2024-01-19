<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ImageAddController;
use App\Http\Controllers\VoteController;
use App\Http\Controllers\ImageRemoveController;


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

//strona główna
Route::get('/', [ImageController::class, 'index']);

//pokazanie boksa z obrazkiem
Route::get('/image/show/{image}', [ImageController::class, 'showImage']);

//LOGOWANIEpokazanie formularza w get oraz metoda post wysyłająca dane do bazy
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);

//WYLOGOWANIE
Route::get('/logout', [LoginController::class, 'logout']);

//REJESTRACJA pokazanie formularza w get oraz metoda post wysyłająca dane do bazy 
Route::get('/register', [RegisterController::class, 'showRegisterForm']);
Route::post('/register', [RegisterController::class, 'register'])->middleware(['checkEmailExistence']);

//DODANIE OBRAZKA
Route::get('/image/add', [ImageAddController::class, 'showAddImageForm'])->middleware(['auth', 'canUserAddImage']);
Route::post('/image/add', [ImageAddController::class, 'addImage'])->middleware(['auth', 'canUserAddImage']);

//ODDANIE OGŁOSU
Route::post('/image/vote', [VoteController::class, 'addVote'])->middleware(['auth', 'canUserVote']);

//DELETE
Route::post('/image/remove', [ImageRemoveController::class, 'removeImage'])->middleware(['auth', 'canUserRemoveImage']);



