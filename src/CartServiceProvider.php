<?php

namespace OsamaElnagar\Cart;

use Illuminate\Support\ServiceProvider;
use OsamaElnagar\Cart\Interfaces\CartRepositoryInterface;
use OsamaElnagar\Cart\Models\Cart;
use OsamaElnagar\Cart\Observers\CartObserver;
use OsamaElnagar\Cart\Repositories\CartRepository;

class CartServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/config/cart.php', 'cart');

        $this->app->bind(CartRepositoryInterface::class, function () {
            return new CartRepository;
        });
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/cart.php' => config_path('cart.php'),
            ], 'cart-config');
        }

        Cart::observe(CartObserver::class);
    }
}
