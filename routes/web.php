<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TransactionController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




Route::middleware('auth')->group(function () 
{
    Route::prefix('transacoes')->group(function () 
    {
        Route::get('/exibir/{year?}/{month?}', [TransactionController::class, 'index'])
            ->name('transactions_index');
    });   
});
    
