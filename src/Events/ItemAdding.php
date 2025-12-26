<?php

namespace OsamaElnagar\Cart\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ItemAdding
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public Model $cartable,
        public int $quantity
    ) {}
}
