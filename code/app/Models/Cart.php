<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property string        $id
 * @property string | null $user_id
 * @property string | null $item_id
 * @property int           $quantity
 * @property Carbon | null $created_at
 * @property Carbon | null $updated_at
 */
class Cart extends Model
{
    use HasFactory;
    use Timestamp;

    protected $fillable = [
        'user_id',
        'item_id',
        'quantity',
        'created_at',
        'updated_at',
    ];

    protected $guarded = [
        'id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
