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

use App\Http\Controllers\TodoController;

Route::get('/todo', [TodoController::class, 'index'])->name('todo');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
Route::get('/todo/{id}/edit', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todo/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/todo/{id}', [TodoController::class, 'destroy'])->name('todo.destroy');



