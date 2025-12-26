<?php

namespace OsamaElnagar\Cart\Observers;

use OsamaElnagar\Cart\Models\Cart;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CartObserver
{
    public function creating(Cart $cart): void
    {
        if (config('cart.log_enabled')) {
            Log::info("[OsamaCart] Observer: Creating cart item", [
                'cartable_id' => $cart->cartable_id,
                'cartable_type' => $cart->cartable_type,
            ]);
        }

        $cart->id = Str::uuid();
        $cart->cookie_id = Cart::getCookieID();
    }
}
