<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;
use App\Http\Middleware\UserMiddleware;

Route::get('/', function(){
    return view('register.login');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});

Route::get('/index', [FlightController::class, 'index'])->name('flight.index')->middleware([UserMiddleware::class]);

Route::controller(TicketController::class)->prefix('flights')->name('ticket.')->group(function () {
    Route::get('/ticket/{flight:id}', 'index')->middleware([UserMiddleware::class])->name('index');
    Route::get('/book/{flight:id}', 'create')->middleware([UserMiddleware::class])->name('create');
});

Route::controller(TicketController::class)->prefix('ticket')->name('ticket.')->group(function () {
    Route::post('/submit', 'store')->middleware([UserMiddleware::class])->name('store');
    Route::put('/board/{ticket:id}', 'boarding')->middleware([UserMiddleware::class])->name('boarding');
    Route::delete('/board/{ticket:id}', 'destroy')->middleware([UserMiddleware::class])->name('destroy');
});

