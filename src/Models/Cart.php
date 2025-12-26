<?php

namespace OsamaElnagar\Cart\Models;

use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use OsamaElnagar\Cart\Scopes\CartScope;
use Ramsey\Uuid\UuidInterface;

#[ScopedBy([CartScope::class])]
class Cart extends Model
{
    use HasFactory;

    public function getTable()
    {
        return config('cart.table_name', 'carts');
    }

    protected $fillable = [
        'user_id',
        'cookie_id',
        'cartable_id',
        'cartable_type',
        'quantity',
        'options',
    ];

    protected $casts = [
        'options' => 'array',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public static function getCookieID(): UuidInterface|string
    {
        $cookie_name = config('cart.cookie.name', 'cart_id');
        $cookie_id = Cookie::get($cookie_name);
        if (empty($cookie_id)) {
            $cookie_id = Str::uuid();
            Cookie::queue($cookie_name, $cookie_id, config('cart.cookie.lifetime', 30 * 24 * 60));
        }

        return $cookie_id;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('cart.user_model', \App\Models\User::class))->withDefault([
            'name' => 'Anonymous User',
        ]);
    }

    public function cartable(): MorphTo
    {
        return $this->morphTo();
    }
}
