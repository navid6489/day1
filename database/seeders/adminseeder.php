<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str;
use DB;
class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'name' => Str::random(3),
            'email' => Str::random(3).'@gmail.com',
            'password' => Str::random(3)
        ]);  
    }
}
