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


Route::prefix('/account')->group(function () {
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
});


Route::prefix('cart')->group(function () {
  Route::get('/', [CartController::class, 'show'])->name('cart');
  Route::delete('/delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');
  Route::post('/update', [CartController::class, 'updateCart'])->name('cart.update');
});


Route::prefix('collection')->group(function () {
  Route::get('/{title}', [CollectionController::class, 'showNewBooks'])->name('product');
  Route::get('/', [CollectionController::class, 'show'])->name('product');
});

Route::get('/sort-products', [CollectionController::class, 'sortProduct']);
Route::get('/filter-products',  [CollectionController::class, 'filterByType']);






Route::prefix('admin')->group(function () {
  Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
  Route::get('/products', [AdminController::class, 'getProducts'])->name('product');
  Route::get('/products/search',  [AdminController::class, 'searchProduct'])->name('products.search');

  Route::get('/editProduct/{id}', [AdminController::class, 'editProduct']);

  Route::get('/orders', function () {
    return view('admin.order');
  });

  Route::get('/editProd/{id}', [AdminController::class, 'showEditProd']);
  Route::get('/addProd', [AdminController::class, 'showAddProd']);

  Route::post('/handler/editProduct/{id}', [AdminController::class, 'editProduct']);
  Route::post('/handler/addProduct', [AdminController::class, 'addProduct']);
});





Route::get('/checkout', [CheckoutController::class, 'show']);
//handle checkout
Route::post('/handle/checkout', [CheckoutController::class, 'handleCheckout']);


//logout
Route::post('/logout', [UserController::class, 'logout']);

//show login page
Route::get('/login', [UserController::class, 'showLogin'])->name('login');
//handle login
Route::post('/handler/login', [UserController::class, 'handleLogin']);





//product Detail 
Route::get('/productDetail/{name}', [ProductDetailController::class, 'index'])->name('/productDetail/{name}');
Route::post('/productDetail/{name}', [ProductDetailController::class, 'addCart']);

//show register page
Route::get('/register', [UserController::class, 'showregister'])->name('register');

//handle register
Route::post('/handler/register', [UserController::class, 'handleRegister']);
