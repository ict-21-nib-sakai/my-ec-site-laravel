<?php

namespace Tests\Unit\App\Models;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function categoryリレーションシップが機能すること()
    {
        $this->refreshDatabase();

        // まず、カテゴリを作る。
        Category::factory()
            ->count(20)
            ->create();

        // つぎに商品を作る。
        Item::factory()
            ->count(100)
            ->create();

        $item = Item::query()->first();

        $this->assertInstanceOf(
            BelongsTo::class,
            $item->category()
        );

        $this->assertInstanceOf(
            Category::class,
            $item->category->first()
        );
    }
}
