<?php

namespace OsamaElnagar\Cart\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use OsamaElnagar\Cart\Models\Cart;

trait Carter
{
    /**
     * Get all cart items for the model.
     */
    public function carts(): HasMany
    {
        return $this->hasMany(Cart::class, 'user_id');
    }
}
