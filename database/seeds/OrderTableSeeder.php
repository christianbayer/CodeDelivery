<?php

use CodeDelivery\Models\Category;
use CodeDelivery\Models\Order;
use CodeDelivery\Models\OrderItem;
use CodeDelivery\Models\Product;
use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Order::class, 10)->create()->each(function($o){
            for($i = 0; $i<=5; $i++){
                $o->items()->save(factory(OrderItem::class)->make([
                    'product_id' => rand(1,5),
                    'qtd' => 2,
                    'price' => 50,
                ]));
            }
        });
    }
}
