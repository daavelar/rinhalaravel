<?php

namespace App\Http\Controllers;

use App\Repositories\CustomersRepository;
use Illuminate\Http\Request;

class ListBankStatementController extends Controller
{
    public function __invoke($customerId, Request $request)
    {
        $customer = app(CustomersRepository::class)->find($customerId);

        return [
            'saldo' => [
                'total' => $customer->balance,
                'data_extrato' => now()->toIso8601ZuluString(),
                'limite' => $customer->limit
            ],
            'ultimas_transacoes' => $customer->transactions
        ];
    }
}
