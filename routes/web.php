<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;

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

Route::controller(OrderController::class)->group(function () {
    Route::get('/orders/pizzas', 'index')->name('order.index')->middleware('auth');
    Route::get('/orders/pizzas/create', 'create')->name('order.create')->middleware('auth');
    Route::post('/orders/pizzas', 'store')->name('order.store')->middleware('auth');
    Route::get('/orders/pizzas/{id}', 'show')->name('order.show')->middleware('auth');
    Route::delete('/orders/pizzas/{id}', 'destroy')->name('order.destroy')->middleware('auth');
});

Route::controller(PizzaController::class)->group(function () {
    Route::get('/pizzas', 'index')->name('pizzas.index');
    Route::get('/pizzas/create', 'create')->name('pizzas.create');
    Route::post('/pizzas', 'store')->name('pizzas.store');
    Route::get('/pizzas/{id}', 'show')->name('pizzas.show');
});

$blackList = [
    'register' => false
];
Auth::routes($blackList);

Route::get('/home', [HomeController::class, 'index'])->name('home');
