<?php

namespace App\Repositories;

use App\Models\Transaction;

class TransactionsRepositoryEloquent implements TransactionsRepository
{
    public function create($value, $description, $type, $customerId)
    {
        return Transaction::create([
            'value' => $value,
            'description' => $description,
            'type' => $type,
            'customer_id' => $customerId,
            'created_at' => now()
        ]);
    }
}
