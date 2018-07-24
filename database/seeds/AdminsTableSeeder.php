<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i < 10; $i++){
            DB::table('admins')->insert([
                'username' => 'admin_' . $i,
                'password' => md5('123456'),
                'email' => 'admin_'.$i.'@gmail.com',
                'role' => -1,
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => null
            ]);
        }
    }
}
