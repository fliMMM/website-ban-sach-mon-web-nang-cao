<?php

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

Route::get('/', function () {
  return view('home');
});



Route::get('/cart', function () {
  return view('cart');
});

//show login form
// Route::get('/login', [UserController::class, 'showLogin'])->name('login');


// // //show register form
// Route::get('/', [UserController::class, 'showRegister'])->name('register');

//create users
// Route::post('/users', [UserController::class, 'createUser']);


//logout
Route::post('/logout', [UserController::class, 'logout']);

//show login page
Route::get('/login', [UserController::class, 'showLogin']);
Route::get('/register', [UserController::class, 'showregister']);

//handle login
Route::post('/handler/login', [UserController::class, 'handleLogin']);

//handle register
Route::post('/handler/register', [UserController::class, 'handleRegister']);
