<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\HomeController;
use App\Models\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;

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


Route::get('/', [HomeController::class, 'show'])->name('home');
Route::get('/search',[HomeController::class,'search']);
Route::get('/cart', function () {
  return view('cart');
});


Route::get('/collection', [CollectionController::class, 'show'])->name('collection');
Route::get('/filter-collection', [CollectionController::class, 'filter']);


Route::prefix('admin')->group(function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });
  Route::get('/products', function () {
    return view('admin.product');
  });
});

Route::get('/checkout', [CheckoutController::class, 'show']);

//show login form
// Route::get('/login', [UserController::class, 'showLogin'])->name('login');


// // //show register form
// Route::get('/', [UserController::class, 'showRegister'])->name('register');

//create users
// Route::post('/users', [UserController::class, 'createUser']);


//logout
Route::post('/logout', [UserController::class, 'logout']);

//show login page
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
//handle login
Route::post('/handler/login', [UserController::class, 'handleLogin']);



//delete file
Route::post('/file/delete/{id}', [FileController::class, 'delete']);

//update file
Route::post('/file/edit/{id}', [FileController::class, 'update']);

//product Detail 
Route::get('/productDetail/{name}', [ProductDetailController::class, 'index'])->name('productDetail');


//show register page
Route::get('/register', [UserController::class, 'showregister'])->name('register');

//handle register
Route::post('/handler/register', [UserController::class, 'handleRegister']);

