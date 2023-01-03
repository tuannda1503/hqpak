<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
	return view('welcome');
});

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
	return redirect('sign-in');
})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', [UserController::class, 'index'])->name('tables');


	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');

	Route::get('users', [UserController::class, 'index'])->name('users.index');
	Route::get('user/{id}', [UserController::class, 'show'])->name('user-detail');
	Route::patch('user-update/{id}', [UserController::class, 'update'])->name('user-update');

	Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
	Route::get('customer/{id}', [CustomerController::class, 'show'])->name('customer-detail');
	Route::get('customer-create', [CustomerController::class, 'store'])->name('customer-create');
	Route::post('customer-create', [CustomerController::class, 'create'])->name('customer.create');
	Route::patch('customer-update/{id}', [CustomerController::class, 'update'])->name('customer-update');

	Route::get('products', [ProductController::class, 'index'])->name('products.index');
	Route::get('product/{id}', [ProductController::class, 'show'])->name('product-detail');
	Route::get('product-create', [ProductController::class, 'store'])->name('product-create');
	Route::post('product-create', [ProductController::class, 'create'])->name('product.create');
	Route::patch('product-update/{id}', [ProductController::class, 'update'])->name('product-update');

	Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
	Route::get('order/{id}', [OrderController::class, 'show'])->name('order-detail');
	Route::get('order-create', [OrderController::class, 'store'])->name('order-create');
	Route::post('order-create', [OrderController::class, 'create'])->name('order.create');
	Route::patch('order-update/{id}', [OrderController::class, 'update'])->name('order-update');
});
