<?php

use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/process/file', [ProcessController::class, 'processFile'])->name('process.file');
