<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HotelReservationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoanCalculatorController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DashboardController;  // Añadir esta línea

// Página principal
Route::get('/', function () {
    return view('welcome');
});

// Autenticación
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Actualiza la ruta de logout para usar GET en lugar de POST
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Contacto
Route::get('/contact', [ContactController::class, 'show'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Reserva de Hotel
Route::get('/hotel', [HotelReservationController::class, 'show'])->name('hotel.form');
Route::post('/hotel', [HotelReservationController::class, 'reserve'])->name('hotel.reserve');

// Agregar estas rutas para reservas de hotel
// Agregar estas rutas para la gestión de reservas
Route::get('/hotel/{id}/edit', [HotelReservationController::class, 'edit'])->name('hotel.edit');
Route::put('/hotel/{id}', [HotelReservationController::class, 'update'])->name('hotel.update');
Route::delete('/hotel/{id}', [HotelReservationController::class, 'destroy'])->name('hotel.destroy');

// Productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// Calculadora de Préstamos
Route::get('/loan', [LoanCalculatorController::class, 'show'])->name('loan.calculator');
Route::post('/loan', [LoanCalculatorController::class, 'calculate'])->name('loan.calculate');

// Conversor de Divisas
Route::get('/currency', [CurrencyController::class, 'show'])->name('currency.converter');
Route::post('/currency', [CurrencyController::class, 'convert'])->name('currency.convert');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/hotel/reservations', [HotelReservationController::class, 'index'])->name('hotel.reservations');
