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
                    'name' => 'Original',
                    'description' => 'Cheese, tomato sauce',
                    'small' => '8',
                    'medium' => '9',
                    'large' => '11',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Gimme the Meat',
                    'description' => 'Pepperoni, ham, chicken, minced beef, sausage, bacon',
                    'small' => '11',
                    'medium' => '14.50',
                    'large' => '16.50',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Veggie Delight',
                    'description' => 'Onions, green peppers, mushrooms, sweetcorn',
                    'small' => '10',
                    'medium' => '13',
                    'large' => '15',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'name' => 'Make Mine Hot',
                    'description' => 'Chicken, onions, green peppers, jalapeno peppers',
                    'small' => '11',
                    'medium' => '13',
                    'large' => '15',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],


            ]);
    }
}
