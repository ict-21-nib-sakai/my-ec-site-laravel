<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int    $id
 * @property string $name        商品名
 * @property int    $category_id
 * @property string $color       商品の色
 * @property int    $unit_price  単価
 * @property int    $stock       残り在庫数
 * @property bool   $recommended おすすめ商品
 * @property bool   $suspended   取り扱い停止中
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class Item extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Timestamp;

    protected $fillable = [
        'name',
        'maker',
        'category_id',
        'color',
        'unit_price',
        'stock',
        'recommended',
        'suspended',
    ];

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
