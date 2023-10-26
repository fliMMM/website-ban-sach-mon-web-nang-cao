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
Route::get('/layout', [HomeController::class, 'layoutShow']);
Route::get('/search', [HomeController::class, 'search']);

Route::prefix('/account')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [AccountController::class, 'profile']);
        Route::post('/', [AccountController::class, 'updateProfile']);
        Route::prefix('/address')->group(function () {
            Route::get('/', [AccountController::class, 'address']);
            Route::post('/addAddress', [AccountController::class, 'addAddress']);
            Route::get('/checkDefault/{id}', [AccountController::class, 'checkDefaultAddress']);
            Route::get('/editAddress/{id}', [AccountController::class, 'editAddress']);
            Route::post('/updateAddress', [AccountController::class, 'updateAddress']);
            Route::get('/deleteAddress/{id}', [AccountController::class, 'deleteAddress']);
        });
        Route::prefix('/bookRegistration')->group(function () {
            Route::get('/', [AccountController::class, 'registerBook']);
            Route::post('/addBookRegistration', [AccountController::class, 'addRegistrationBook']);
        });
        Route::get('/listBookReg', [AccountController::class, 'listBookReg']);
        Route::get('/change-password', [AccountController::class, 'showChangePassword']);
        Route::post('/handler/change-password', [AccountController::class, 'handleChangePassword']);
        Route::get('/order', [AccountController::class, 'showOrder']);
    });



Route::prefix('admin')
    ->middleware('auth', 'can:admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/products', [AdminController::class, 'getProducts'])->name('admin.product');
        Route::get('/products/search', [AdminController::class, 'searchProduct'])->name('products.search');
        Route::get('/editProduct/{id}', [AdminController::class, 'editProduct']);
        Route::delete('/deleteProduct/{id}', [AdminController::class, 'deleteProduct']);

        Route::get('/orders', [AdminController::class, 'showOrderList'])->name('admin.order');
        Route::prefix('bookReg')->group(function () {
            Route::get('/', [AdminController::class, 'bookReg'])->name('bookReg');
            Route::get('/confirm', [AdminController::class, 'manageBookReg'])->name('bookConfirm');
            Route::post('/confirm', [AdminController::class, 'bookRegConfirm']);
        });
        Route::post('/update-order-status/{id}', [AdminController::class, 'updateOrder'])->name('update.order.status');
        Route::get('/order/{id}', [AdminController::class, 'showOrderDetail'])->name('order.detail');
        Route::get('/editProd/{id}', [AdminController::class, 'showEditProd']);
        Route::get('/addProd', [AdminController::class, 'showAddProd']);
        Route::get('/userManage', [AdminController::class, 'userManage'])->name('admin.userManage');
        Route::post('/userManage/userDelete', [AdminController::class, 'userDelete']);
        Route::post('/handler/editProduct/{id}', [AdminController::class, 'editProduct']);
        Route::post('/handler/addProduct', [AdminController::class, 'addProduct']);

        Route::get('/solvedOrder', [AdminController::class, 'showSolvedOrder'])->name('admin.solvedOrder');
    });


Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'show'])->name('cart');
    Route::delete('/delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('cart.delete');
    Route::post('/update', [CartController::class, 'updateCart'])->name('cart.update');
});


Route::prefix('collection')->group(function () {
    Route::get('/{title}', [CollectionController::class, 'showCollection'])->name('product');
    Route::get('/', [CollectionController::class, 'show'])->name('product');
});

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

//delete file
Route::post('/file/delete/{id}', [FileController::class, 'delete']);

Route::post('/handler/reset-password', [UserController::class, 'handleResetPassword'])
    ->middleware('guest')
    ->name('password.update');
Route::post('/handler/forgot-password', [UserController::class, 'handleForgotPassword'])
    ->middleware('guest')
    ->name('password.email');
Route::get('/forgot-password', [UserController::class, 'showResetPasswordForm'])
    ->name('showResetPasswordForm')
    ->middleware('guest')
    ->name('password.request');
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset_password', ['token' => $token]);
})
    ->middleware('guest')
    ->name('password.reset');

//product Detail
Route::get('/productDetail/{name}', [ProductDetailController::class, 'index'])->name('/productDetail/{name}');
Route::post('/productDetail/{name}', [ProductDetailController::class, 'addCart']);

//show register page
Route::get('/register', [UserController::class, 'showregister'])->name('register');

//handle register
Route::post('/handler/register', [UserController::class, 'handleRegister']);
