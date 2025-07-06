<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);

Route::delete('/tags/cleanup', [TagController::class, 'cleanup'])->name('tags.cleanup');
Route::resource('tags', TagController::class);