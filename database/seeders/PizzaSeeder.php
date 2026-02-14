<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pizzas')->insert([
            [
                'type' => 'Margherita',
                'base' => 'Classic',
                'name' => 'Margherita',
                'toppings' => json_encode(['mozzarella', 'basil']),
                'image_url' => '/img/pizza1.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pepperoni',
                'base' => 'Thin',
                'name' => 'Pepperoni Feast',
                'toppings' => json_encode(['mozzarella', 'pepperoni']),
                'image_url' => '/img/pizza2.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Veggie',
                'base' => 'Classic',
                'name' => 'Garden Veggie',
                'toppings' => json_encode(['mozzarella', 'peppers', 'onions', 'olives']),
                'image_url' => '/img/pizza3.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Hawaiian',
                'base' => 'Thick',
                'name' => 'Hawaiian Delight',
                'toppings' => json_encode(['mozzarella', 'ham', 'pineapple']),
                'image_url' => '/img/pizza4.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Volcano',
                'base' => 'Thin & Crispy',
                'name' => 'Volcano Heat',
                'toppings' => json_encode(['mozzarella', 'chili', 'pepperoni']),
                'image_url' => '/img/pizza5.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Margherita',
                'base' => 'Garlic Crust',
                'name' => 'Garlic Margherita',
                'toppings' => json_encode(['mozzarella', 'basil', 'garlic']),
                'image_url' => '/img/pizza6.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Veg Supreme',
                'base' => 'Classic',
                'name' => 'Supreme Veg',
                'toppings' => json_encode(['mozzarella', 'mushrooms', 'peppers', 'olives']),
                'image_url' => '/img/pizza7.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Pepperoni',
                'base' => 'Cheesy Crust',
                'name' => 'Cheesy Pepperoni',
                'toppings' => json_encode(['mozzarella', 'pepperoni', 'extra cheese']),
                'image_url' => '/img/pizza8.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Hawaiian',
                'base' => 'Thin & Crispy',
                'name' => 'Crispy Hawaiian',
                'toppings' => json_encode(['mozzarella', 'ham', 'pineapple']),
                'image_url' => '/img/pizza9.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type' => 'Volcano',
                'base' => 'Thick',
                'name' => 'Lava Blast',
                'toppings' => json_encode(['mozzarella', 'chili', 'garlic']),
                'image_url' => '/img/pizza10.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
