<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i < 10; $i++){
            DB::table('categories')->insert([
                'parentid' => 0,
                'namecat' => 'TT Cong So_'.$i,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null,
                'description' =>null
            ]);
        }
    }
}
