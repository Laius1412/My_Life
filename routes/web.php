<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\TimeTableController;

Route::get('/todo', [TodoController::class, 'index'])->name('todo');

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/time-table', [TimeTableController::class, 'index'])->name('time-table');
Route::post('/time-table', [TimeTableController::class, 'store'])->name('time-table.store');

Route::get('/achievement', function () {
    return view('achievement');
})->name('achievement');

Route::get('/diary', function () {
    return view('diary');
})->name('diary');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::get('/diary', [DiaryController::class, 'index'])->name('diary');
Route::post('/diary', [DiaryController::class, 'store'])->name('diary.store');
Route::delete('/diary/{id}', [DiaryController::class, 'destroy'])->name('diary.destroy');
