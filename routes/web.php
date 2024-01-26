<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransationController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');









Route::get('/transações', [TransationController::class, 'index'])
    ->name('IndexTransations');
