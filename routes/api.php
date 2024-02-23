<?php

use App\Http\Controllers\CreateTransactionController;
use App\Http\Controllers\ListBankStatementController;
use Illuminate\Support\Facades\Route;

Route::post('clientes/{id}/transacoes', CreateTransactionController::class);
Route::get('clientes/{id}/extrato', ListBankStatementController::class);
