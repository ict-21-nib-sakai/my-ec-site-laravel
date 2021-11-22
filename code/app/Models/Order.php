<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string        $id
 * @property string | null $user_id
 * @property string        $payment_method
 * @property string        $shipping_address_type
 * @property string        $shipping_address
 * @property string        $user_name
 * @property Carbon | null $created_at
 * @property Carbon | null $updated_at
 */
class Order extends Model
{
    use HasFactory;
    use Timestamp;

    protected $fillable = [
        'user_id',
        'payment_method',
        'shipping_address_type',
        'shipping_address',
        'user_name',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
