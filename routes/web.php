<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/todo', function () {
    return view('todo');
})->name('todo');

Route::get('/time-table', function () {
    return view('time-table');
})->name('time-table');

Route::get('/achievement', function () {
    return view('achievement');
})->name('achievement');

Route::get('/diary', function () {
    return view('diary');
})->name('diary');



