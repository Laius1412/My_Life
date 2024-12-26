<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MyController;

Route::get('/trang-ca-nhan', [MyController::class, 'showView']);


