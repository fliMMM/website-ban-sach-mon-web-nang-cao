<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\HomeController;
use App\Models\File;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Gate;

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


Route::prefix('/account')->middleware('auth')->group(function () {
  Route::get('/', [AccountController::class, 'profile']);
  Route::post('/', [AccountController::class, 'updateProfile']);
  Route::get('/address', [AccountController::class, 'address']);
  Route::post('/address/addAddress', [AccountController::class, 'addAddress']);
  Route::get('/editAddress/{id}', [AccountController::class, 'editAddress']);
  Route::post('address/updateAddress', [AccountController::class, 'updateAddress']);
  Route::get('/bookRegistration', [AccountController::class, 'registerBook']);
  Route::post('/bookRegistration/addBookRegistration', [AccountController::class, 'addRegistrationBook']);
  Route::get('/listBookReg', [AccountController::class, 'listBookReg']);
  Route::get('/deleteAddress/{id}', [AccountController::class, 'deleteAddress']);
  Route::get('/change-password', [AccountController::class, 'showChangePassword']);
  Route::post('/handler/change-password', [AccountController::class, 'handleChangePassword']);
});

Route::prefix('admin')->middleware('auth', 'can:admin')->group(function () {
  Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
  Route::get('/products', [AdminController::class, 'getProducts'])->name('product');
  Route::get('/products/search',  [AdminController::class, 'searchProduct'])->name('products.search');

  Route::get('/editProduct/{id}', [AdminController::class, 'editProduct']);

  Route::get('/orders', [AdminController::class, 'showOrderList']);

  Route::get('/editProd/{id}', [AdminController::class, 'showEditProd']);
  Route::get('/addProd', [AdminController::class, 'showAddProd']);

  Route::post('/handler/editProduct/{id}', [AdminController::class, 'editProduct']);
  Route::post('/handler/addProduct', [AdminController::class, 'addProduct']);
});


Route::get('/cart', [CartController::class, 'show'])->name('cart');
Route::delete('/delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');


Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');


Route::get('/collection/{title}', [CollectionController::class, 'showNewBooks'])->name('collection');
Route::get('/collection', [CollectionController::class, 'show'])->name('collection');
Route::get('/sort-products', [CollectionController::class, 'sortProduct']);
Route::get('/filter-products',  [CollectionController::class, 'filterByType']);





Route::get('/checkout', [CheckoutController::class, 'show']);
//handle checkout
Route::post('/handle/checkout', [CheckoutController::class, 'handleCheckout']);

//logout
Route::post('/logout', [UserController::class, 'logout']);

//show login page
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
//handle login
Route::post('/handler/login', [UserController::class, 'handleLogin']);


Route::post('/handler/reset-password', [UserController::class, 'handleResetPassword'])->middleware('guest')->name('password.update');
Route::post('/handler/forgot-password', [UserController::class, 'handleForgotPassword'])->middleware('guest')->name('password.email');
Route::get("/forgot-password", [UserController::class, 'showResetPasswordForm'])->name('showResetPasswordForm')->middleware('guest')->name('password.request');
Route::get('/reset-password/{token}', function (string $token) {
  return view('auth.reset_password', ['token' => $token]);
})->middleware('guest')->name('password.reset');


//product Detail 
Route::get('/productDetail/{name}', [ProductDetailController::class, 'index'])->name('/productDetail/{name}');
Route::post('/productDetail/{name}', [ProductDetailController::class, 'addCart']);

//show register page
Route::get('/register', [UserController::class, 'showregister'])->name('register');

//handle register
Route::post('/handler/register', [UserController::class, 'handleRegister']);
