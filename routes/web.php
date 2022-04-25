<?php

use Illuminate\Support\Facades\Route;
// Controllers
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

// ============= public routes =============
    // show sign pages
Route::get('/', [GuestController::class, 'showGuest']);
Route::get('/register', [SignController::class, 'showRegister']);
Route::get('/login', [SignController::class, 'showLogin']);
    // signUp signIn
Route::post('/Sign-up', [SignController::class, 'registerUser']);
Route::post('/Sign-in', [SignController::class, 'loginUser']);
    // Guest
Route::post('/guest-search-product', [GuestController::class, 'search']);
Route::get('/guestCart', [GuestController::class, 'showGuestCart']);
Route::post('/bring-Guest-Data', [GuestController::class, 'bringGuestData']);

// ============ private routes ============
Route::group(['middleware'=>'auth', 'verify'], function(){
        // Admin
    Route::get('/admin-dashboard', [AdminController::class, 'adminShowDash']);
    Route::get('/admin-show-create', [AdminController::class, 'adminShowCreate']);
    Route::post('/admin-create-product', [AdminController::class, 'createProduct']);
    Route::get('/show-update/{id}', [AdminController::class, 'showUpdate']);
    Route::post('/admin-update-product/{id}', [AdminController::class, 'updateProduct']);
    Route::get('/show-delete/{id}', [AdminController::class, 'deleteProduct']);
        // User
    Route::get('/user-dashboard', [UserController::class, 'userShowDash']);
    Route::post('/user-searh-pcroduct', [UserController::class, 'search']);
    Route::get('/add-to-cart/{id}', [UserController::class, 'addToCart']);
    Route::get('/cart', [UserController::class, 'showCart']);
    Route::get('/remove-from-cart/{name}', [UserController::class, 'removeFromCart']);
        // both
    Route::get('/log-out', [SignController::class, 'logOut']);
});

    // unknown links redrect
Route::get('/{any}', [GuestController::class, 'showGuest']);