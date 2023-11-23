<?php

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
    return view('welcome');
});



// Auth::routes();

Route::get('/', [App\Http\Controllers\Controller::class, 'index'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/service', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/addproduct', [App\Http\Controllers\AddproductController::class, 'index'])->name('addproduct');
Route::post('/addproduct', [App\Http\Controllers\AddproductController::class, 'store'])->name('addproduct');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'store'])->name('admin');
Route::get('/admin/login', [App\Http\Controllers\MyController::class, 'index'])->name('login');
Route::post('/admin/login', [App\Http\Controllers\MyController::class, 'store'])->name('login');
Route::get('/admin/register', [App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/admin/register', [App\Http\Controllers\RegisterController::class, 'store'])->name('register');
Route::get('/customer', [App\Http\Controllers\CustomerController::class, 'index'])->name('customer');
Route::post('/customer', [App\Http\Controllers\CustomerController::class, 'block'])->name('customer');



