<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create();
        factory(App\Currency::class,3)->create();

        factory(App\Category::class,10)->create();
        App\Category::all()->map(function($category){
            $category->parent_id = ($number = rand(0,5)) == 0 ? null : $number;
            $category->save();
        });

        factory(App\Image::class, 10)->create();

        factory(App\Product::class, 40)->create();
        App\Product::all()->map(function($product){
            $category = App\Category::all()->random(1)->toArray();
            $currency = App\Currency::all()->random(1)->toArray();
            $image = App\Image::all()->random(1)->toArray();
            $product->category_id = $category[0]['id'];
            $product->currency_id = $currency[0]['id'];
            $product->images()->attach($image[0]['id']);
            $product->save();
        });

        factory(App\Order::class, 20)->create();
        App\Order::all()->map(function($order){
            $products = App\Product::all()->random(10)->toArray();
            $user = App\User::all()->random(1)->toArray();
            $order->user_id = $user[0]['id'];
            $price = 0;
            foreach($products as $product){
                $quantity = rand(0,10);
                $order->products()->attach($product['id'], [
                    'price' => $product['price'],
                    'quantity' => $quantity,
                ]);
                $price += ($product['price'] * $quantity);
            }
            $order->total = $price;
            $order->save();
        });

    }
}
