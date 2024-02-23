<?php

namespace App\Repositories;

interface TransactionsRepository
{
    public function create($value, $description, $type, $customerId);
}
