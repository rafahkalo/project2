<?php

namespace Database\Seeders;

use App\Models\Car_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gov1= Car_type::create([
            'name' => 'Mercedes',
           
        ]);
        $gov1= Car_type::create([
            'name' => 'Toyota',
           
        ]);
        
    }
}