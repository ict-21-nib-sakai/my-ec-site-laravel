<?php

namespace Tests\Unit\App\Models;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function itemsリレーションシップが機能すること()
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

        $category = Category::query()->first();

        $this->assertInstanceOf(
            HasMany::class,
            $category->items(),
        );

        $this->assertInstanceOf(
            Item::class,
            $category->items->first()
        );
    }
}
