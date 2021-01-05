<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class admin_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->truncate();
        DB::table('admin')->insert([
            'name' => 'admin perpustakaan',
            'email' => 'admin@perpustakaan.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
