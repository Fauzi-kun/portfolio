<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

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

Route::get('/', [indexController::class, 'home']);
Route::get('/data-table', [indexController::class,'table']);
Route::get('/register', [AuthController::class,'register']);
Route::post('/welcome', [AuthController::class,'welcome']);

//Create 
Route::get('/book/create',[BookController::class,'create']);
Route::post('/book', [BookController::class,'store']);

//Read
Route::get('/book', [BookController::class,'index']);
Route::get('/book/{book_id}', [BookController::class,'show']);

//Update
Route::get('/book/{book_id}/edit', [BookController::class,'edit']);
Route::put('/book/{book_id}', [BookController::class,'update']);

//Delete
Route::delete('/book/{book_id}', [BookController::class,'destroy']);