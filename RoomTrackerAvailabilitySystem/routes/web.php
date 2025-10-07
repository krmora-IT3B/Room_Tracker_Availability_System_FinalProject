<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home.alt');

Route::get('/rooms', function () {
    return view('rooms');
})->name('rooms');

Route::get('/availability', function () {
    return view('availability');
})->name('availability');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');