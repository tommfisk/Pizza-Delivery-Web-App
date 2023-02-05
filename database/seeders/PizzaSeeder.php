<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('pizzas')
            ->insertOrIgnore([
                [
                    'pizza_name' => 'original',
                    'pizza_size' => 'small',
                    'pizza_price' => '8',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'original',
                    'pizza_size' => 'medium',
                    'pizza_price' => '9',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'original',
                    'pizza_size' => 'large',
                    'pizza_price' => '11',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'gimme_the_meat',
                    'pizza_size' => 'small',
                    'pizza_price' => '11',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'gimme_the_meat',
                    'pizza_size' => 'medium',
                    'pizza_price' => '14.50',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'gimme_the_meat',
                    'pizza_size' => 'large',
                    'pizza_price' => '16.50',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'veggie_delight',
                    'pizza_size' => 'small',
                    'pizza_price' => '10',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'veggie_delight',
                    'pizza_size' => 'medium',
                    'pizza_price' => '13',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'veggie_delight',
                    'pizza_size' => 'large',
                    'pizza_price' => '15',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'make_mine_hot',
                    'pizza_size' => 'small',
                    'pizza_price' => '11',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'make_mine_hot',
                    'pizza_size' => 'medium',
                    'pizza_price' => '13',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'pizza_name' => 'make_mine_hot',
                    'pizza_size' => 'large',
                    'pizza_price' => '15',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],

            ]);
    }
}
