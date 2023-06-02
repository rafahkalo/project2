<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Stars;
class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stars::create([
            'name'=>'Five Stars',
            'number'=> 5

        ]);
        Stars::create([
            'name'=>'Four Stars',
            'number'=> 4

        ]);
    }
}