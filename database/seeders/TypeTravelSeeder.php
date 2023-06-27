<?php

namespace Database\Seeders;

use App\Models\Type_travel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeTravelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type_travel::create([
            'name' => 'External',
           
        ]);

        Type_travel::create([
            'name' => 'Internal',
           
        ]);
    }
}