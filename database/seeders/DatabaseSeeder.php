<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(TypeTravelSeeder::class);
        $this->call(StarSeeder::class);
        $this->call(GovermentSeeder::class);
<<<<<<< HEAD
        $this->call(CarTypeSeeder::class);
        $this->call(ColorSeeder::class);
=======
>>>>>>> 56a234b2000b2235402f92a9f8949f53699211b0
    }
}