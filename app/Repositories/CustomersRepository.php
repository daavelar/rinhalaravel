<?php

namespace App\Repositories;

interface CustomersRepository
{
    public function findOrFail(int $id);
}
