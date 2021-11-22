<?php

namespace Tests\Unit\App\Models;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cartリレーションシップが機能すること()
    {
        $this->refreshDatabase();

        // 1. ユーザーを作る。
        User::factory()
            ->count(2)
            ->create();

        // 2. カテゴリを作る
        Category::factory()
            ->count(2)
            ->create();

        // 3. 商品を作る。
        Item::factory()
            ->count(10)
            ->create();

        // 4. カートを作る
        Cart::factory()
            ->count(20)
            ->create();

        $user = User::query()->first();

        $this->assertInstanceOf(
            HasMany::class,
            $user->cart()
        );

        $this->assertInstanceOf(
            Collection::class,
            $user->cart
        );

        $this->assertInstanceOf(
            Cart::class,
            $user->cart->first(),
        );
    }

    /** @test */
    public function orderリレーションシップが機能すること()
    {
        // 1. ユーザーを作る。
        User::factory()
            ->count(2)
            ->create();

        // 2. 注文を作る
        Order::factory()
            ->count(10)
            ->create();

        $user = User::query()->first();

        $this->assertInstanceOf(
            HasMany::class,
            $user->order()
        );

        $this->assertInstanceOf(
            Collection::class,
            $user->order
        );
    }
}
