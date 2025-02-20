<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AchievementController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Các route cần đăng nhập
Route::middleware(['auth'])->group(function () {
    Route::get('/todo', [TodoController::class, 'index'])->name('todo');
    Route::get('/time-table', [TimeTableController::class, 'index'])->name('time-table');
    Route::post('/time-table', [TimeTableController::class, 'store'])->name('time-table.store');
    Route::get('/achievement', [AchievementController::class, 'index'])->name('achievement');
    Route::post('/achievement', [AchievementController::class, 'store'])->name('achievement.store');
    Route::get('/achievement/{id}/edit', [AchievementController::class, 'edit'])->name('achievement.edit');
    Route::put('/achievement/{id}', [AchievementController::class, 'update'])->name('achievement.update');
    Route::delete('/achievement/{id}', [AchievementController::class, 'destroy'])->name('achievement.destroy');
    Route::get('/diary', [DiaryController::class, 'index'])->name('diary');
    Route::post('/diary', [DiaryController::class, 'store'])->name('diary.store');
    Route::delete('/diary/{id}', [DiaryController::class, 'destroy'])->name('diary.destroy');
    Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');
    Route::get('/todos/{id}/edit', [TodoController::class, 'edit'])->name('todos.edit');
    Route::put('/todos/{id}', [TodoController::class, 'update'])->name('todos.update');
    Route::delete('/todos/{id}', [TodoController::class, 'destroy'])->name('todos.destroy');
});

// Các route đăng nhập, đăng ký
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
