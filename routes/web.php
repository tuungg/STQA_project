<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;


Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('register');
    Route::get('/login', 'showLogin')->name('login');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});


Route::get('/flights', [FlightController::class, 'index'])->name('flight.index');

// untuk menampilkan daftar detail tiket-tiket dari penerbangan tertentu
Route::get('/flights/ticket/{flight:id}', [TicketController::class, 'index'])->name('ticket.index');

Route::get('/flights/book/{flight:id}', [TicketController::class, 'create'])->name('ticket.create');

Route::post('/ticket/submit', [TicketController::class, 'store'])->name('ticket.store');

Route::put('/ticket/board/{ticket:id}', [TicketController::class, 'boarding'])->name('ticket.boarding');
Route::delete('/ticket/board/{ticket:id}', [TicketController::class, 'destroy'])->name('ticket.destroy');


