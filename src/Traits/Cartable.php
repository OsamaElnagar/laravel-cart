<?php

namespace OsamaElnagar\Cart\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use OsamaElnagar\Cart\Models\Cart;

trait Cartable
{
    /**
     * Get all cart items for the model.
     */
    public function cartItems(): MorphMany
    {
        return $this->morphMany(Cart::class, 'cartable');
    }
}
