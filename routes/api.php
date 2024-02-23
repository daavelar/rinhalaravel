<?php

use App\Http\Controllers\CreateTransactionController;
use App\Http\Controllers\ListBankStatementController;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Cache::lock('createTransaction')->block(5, function () {
    Route::post('clientes/{id}/transacoes', CreateTransactionController::class);
});
Route::get('clientes/{id}/extrato', ListBankStatementController::class);
