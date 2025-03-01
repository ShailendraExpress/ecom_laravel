<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Samsung TV',
            'price' => '50000',
            'category' => 'TV',
            'gallery' => 'https://shorturl.at/zTfVO',
            'description' => 'This is new TV of the Samsung company'
        ]);
    }
}