<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [[
            'name' => 'Teknologi',
            'user_id' => 1
        ],[
            'name' => 'Ekonomi',
            'user_id' => 1
        ]];

        DB::table('categories')->insert($categories);
    }
}
