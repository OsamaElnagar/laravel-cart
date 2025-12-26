<?php

namespace OsamaElnagar\Cart\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CartCleared
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $cookieId
    ) {}
}
