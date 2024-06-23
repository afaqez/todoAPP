<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/todo', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::middleware(['auth', 'verified'])->get('/dashboard', [TodoController::class, 'index'])->name('dashboard');
    Route::middleware(['auth', 'verified'])->post('/dashboard', [TodoController::class, 'store'])->name('dashboard');
    Route::patch('/{todo}', [TodoController::class, 'update']);
    Route::delete('/{todo}', [TodoController::class, 'destroy']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
