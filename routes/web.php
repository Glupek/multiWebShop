<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [ProductsController::class, 'welcome'])->name('welcome');
Route::get('Nintendo', [ProductsController::class, 'nintendo']);
Route::get('Sega', [ProductsController::class, 'sega']);
Route::get('Playstation', [ProductsController::class, 'playstation']);
Route::get('Xbox', [ProductsController::class, 'xbox']);
Route::get('Figurines', [ProductsController::class, 'figurines']);
Route::post('/', [CartController::class, 'store'])
    ->name('cart.store');

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');

    Route::post('update-profile-info', [AdminController::class, 'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture', [AdminController::class, 'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password', [AdminController::class, 'changePassword'])->name('adminChangePassword');
});

Route::group(['prefix' => 'user', 'middleware' => ['isUser', 'auth', 'PreventBackHistory']], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
});


Route::resource('products', ProductsController::class);
Route::get('/search/', 'ProductsController@search')->name('search');

Route::get('cart', function () {
    return view('cart');
});

Route::get('/cart/update/{rowId}', [CartController::class, 'update'])->name('cart.update');
Route::get('remove-from-cart', [CartController::class, 'remove']);
Route::get('posts', [PostsController::class, 'index']);
Route::get('posts/{post}', function (Post $post) {
    return view('posts.posts');
});
