<?php

namespace App\Http\Controllers;

use App\Jobs\CreateTransactionJob;
use App\Repositories\CustomersRepository;
use Illuminate\Http\Request;

class CreateTransactionController extends Controller
{
    public function __invoke($customerId, Request $request)
    {
        $customer = app(CustomersRepository::class)->findOrFail($customerId);

        if ($request->get('tipo') == 'c') {
            $newBalance = $customer->balance + $request->get('valor');
        }

        if ($request->get('tipo') == 'd') {
            $newBalance = $customer->balance - $request->get('valor');

            if ($newBalance * -1 > $customer->limit) {
                return response('Saldo insuficiente', 422);
            }
        }

        CreateTransactionJob::dispatch(
            $request->get('valor'),
            $request->get('descricao'),
            $request->get('tipo'),
            $customerId
        );

        $customer->balance = $newBalance;
        $customer->save();

        return response([
            'limite' => $customer->limit,
            'saldo' => $customer->balance
        ]);
    }
}
