<?php

namespace App\Providers;

use App\Repositories\CustomersRepository;
use App\Repositories\CustomersRepositoryEloquent;
use App\Repositories\TransactionsRepository;
use App\Repositories\TransactionsRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
    }

    public function boot(): void
    {
        $this->app->bind(CustomersRepository::class, CustomersRepositoryEloquent::class);
        $this->app->bind(TransactionsRepository::class, TransactionsRepositoryEloquent::class);
    }
}
