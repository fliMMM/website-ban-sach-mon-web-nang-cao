<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\HomeController;
use App\Models\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;

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

Route::get('/search', [HomeController::class, 'search']);

Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::delete('/delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');
// routes/web.php

Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');


Route::get('/bookRegistration', function () {
  return view('bookRegistration');
})->name('bookRegistration');

Route::get('/collection', [CollectionController::class, 'show'])->name('collection');
Route::get('/sort-products', [CollectionController::class, 'sortProduct']);
Route::get('/filter-products',  [CollectionController::class, 'filterByType']);

Route::prefix('admin')->group(function () {
  Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
  Route::get('/products', [AdminController::class, 'manageProducts'])->name('product');
  Route::get('/editProduct/{id}', [AdminController::class, 'editProduct']);



  Route::get('/orders', function () {
    return view('admin.order');
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
Route::get('/productDetail/{name}', [ProductDetailController::class, 'index'])->name('/productDetail/{name}');
Route::post('/productDetail/{name}', [ProductDetailController::class, 'addCart']);

//show register page
Route::get('/register', [UserController::class, 'showregister'])->name('register');

//handle register
Route::post('/handler/register', [UserController::class, 'handleRegister']);
