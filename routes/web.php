<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login_register/login');
});

Route::get('/signup', function () {
    return view('login_register/signup');
});

Route::get('/forget', function () {
    return view('login_register/forget');
});
