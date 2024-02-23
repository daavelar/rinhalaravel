<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        Customer::create(['limit' => 1000 * 100, 'balance' => 0]);
        Customer::create(['limit' => 800 * 100, 'balance' => 0]);
        Customer::create(['limit' => 10000 * 100, 'balance' => 0]);
        Customer::create(['limit' => 100000 * 100, 'balance' => 0]);
        Customer::create(['limit' => 5000 * 100, 'balance' => 0]);
    }
}
