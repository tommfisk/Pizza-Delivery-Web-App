<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('deals')
            ->insertOrIgnore([
                [
                    'deal_name' => 'BOGOFF',
                    'deal_description' => "Two medium or two large pizzas charged at the price of the highest priced pizza's selected - collection/delivery",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'deal_name' => 'Three for Two',
                    'deal_description' => "Three medium pizzas charged at the price of the two highest priced pizza's selected - collection/delivery",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'deal_name' => 'Family Feast',
                    'deal_description' => "Four medium pizzas, priced at £30 - collection only",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'deal_name' => 'Two Large',
                    'deal_description' => "Two large pizzas, priced at £25 - collection only",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'deal_name' => 'Two Medium',
                    'deal_description' => "Two medium pizzas, priced at £18 - collection only",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
                [
                    'deal_name' => 'Two Small',
                    'deal_description' => "Two small pizzas, priced at £12 - collection only",
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ],
            ]);
    }
}
