<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\File;
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

Route::get('/', function(){
    return view('home');
});


//show login form
Route::get('/login', [UserController::class, 'showLogin'])->name('login')->middleware('guest');


//show register form
Route::get('/register', [UserController::class, 'showRegister'])->middleware('guest');

//create users
Route::post('/users', [UserController::class, 'createUser']);


//logout
Route::post('/logout', [UserController::class, 'logout']);

//login
Route::post('/users/login', [UserController::class, 'login']);

//uploadFile
Route::post('/uploadfile', [FileController::class, 'upload']);

//delete file
Route::post('/file/delete/{id}', [FileController::class, 'delete']);

//update file
Route::post('/file/edit/{id}', [FileController::class, 'update']);
