<?php

namespace App\Repositories;

use App\Models\Customer;

class CustomersRepositoryEloquent implements CustomersRepository
{
    public function findOrFail(int $id)
    {
        return Customer::with('transactions')->findOrFail($id);
    }
}
