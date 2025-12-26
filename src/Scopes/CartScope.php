<?php

namespace OsamaElnagar\Cart\Scopes;

use OsamaElnagar\Cart\Models\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class CartScope implements Scope
{
    public function apply(Builder $builder, Model $model): void
    {
        $builder->where('cookie_id', Cart::getCookieID());
    }
}
