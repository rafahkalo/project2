<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gov1= Color::create([
            'name' => 'Blue',
           
        ]);
        $gov1= Color::create([
            'name' => 'Black',
           
        ]);
    }
}