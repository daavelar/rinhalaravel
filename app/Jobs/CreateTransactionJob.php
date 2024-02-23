<?php

namespace App\Jobs;

use App\Repositories\TransactionsRepository;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $value;
    private $description;
    private $type;
    private $customerId;

    public function __construct($value, $description, $type, $customerId)
    {
        $this->value = $value;
        $this->description = $description;
        $this->type = $type;
        $this->customerId = $customerId;
    }

    public function handle(): void
    {
        app(TransactionsRepository::class)->create(
            $this->value,
            $this->description,
            $this->type,
            $this->customerId
        );
    }
}
