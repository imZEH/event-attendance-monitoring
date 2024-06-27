<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('admin');
});

Route::get('/attendance', function () {
    return view('attendance');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/evaluation', function () {
    return view('evaluation');
});

Route::get('/users', function () {
    return view('users');
});