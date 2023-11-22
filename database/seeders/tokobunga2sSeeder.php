<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tokobunga2sSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tokobunga2s')->insert([
            'nama'=>'Mawar',
            'harga'=> 50000,
            'stok'=> 10,
            'image'=>'',
       ]);
    }
}
