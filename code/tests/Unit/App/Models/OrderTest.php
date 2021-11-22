<?php

namespace Tests\Unit\App\Models;

use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function userリレーションシップが機能すること()
    {
        $this->refreshDatabase();

        // 1. ユーザーを作る
        User::factory()
            ->count(3)
            ->create();

        // 2. 注文を作る
        Order::factory()
            ->count(10)
            ->create();

        $order = Order::query()->first();

        $this->assertInstanceOf(
            BelongsTo::class,
            $order->user()
        );

        $this->assertInstanceOf(
            User::class,
            $order->user
        );
    }

    /** @test */
    public function orderDetailsリレーションシップが機能すること()
    {
        $this->refreshDatabase();

        // 1. ユーザーを作る
        User::factory()
            ->count(3)
            ->create();

        // 2. 注文を作る
        Order::factory()
            ->count(10)
            ->create();

        // 3. カテゴリを作る
        Category::factory()
            ->count(10)
            ->create();

        // 3. 商品を作る
        Item::factory()
            ->count(100)
            ->create();

        // 4. 注文詳細を作る
        OrderDetail::factory()
            ->count(50)
            ->create();

        $order = Order::query()->first();

        $this->assertInstanceOf(
            HasMany::class,
            $order->orderDetails()
        );

        $this->assertInstanceOf(
            Collection::class,
            $order->orderDetails
        );
    }
}
