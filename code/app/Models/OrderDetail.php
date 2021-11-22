<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property string        $id
 * @property string | null $order_id
 * @property string | null $item_id
 * @property string        $item_name
 * @property string        $item_maker
 * @property int           $item_unit_price
 * @property string | null $item_color
 * @property int           $quantity
 * @property Carbon | null $canceled_at
 */
class OrderDetail extends Model
{
    public const CREATED_AT = null;
    public const UPDATED_AT = null;

    use HasFactory;

    protected $fillable = [
        'order_id',
        'item_id',
        'item_name',
        'item_maker',
        'item_unit_price',
        'item_color',
        'quantity',
        'canceled_at',
    ];

    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'canceled_at',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
