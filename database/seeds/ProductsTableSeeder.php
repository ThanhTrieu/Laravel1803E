<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5 ; $i++) {
            DB::table('products')->insert([
                'catid' => $i,
                'sizeid' => $i,
                'name' => 'So mi VT_'.$i,
                'image' => 'abc.png',
                'price' => 120000,
                'sale' => 0.5,
                'status' => 1,
                'qty' => 10,
                'description' => 'demo abc',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
