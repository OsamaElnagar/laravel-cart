<?php

namespace OsamaElnagar\Cart\Jobs;

use OsamaElnagar\Cart\Interfaces\CartRepositoryInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CleanupAbandonedCartItems implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        //
    }

    public function handle(CartRepositoryInterface $cartRepo): void
    {
        $cartRepo->clearAbandoned(3);
    }
}
