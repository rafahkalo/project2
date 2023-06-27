<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Goverments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GovermentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $gov1= Goverments::create([
            'name' => 'Damas',
           
        ]);
        Branch::create([
            'name'=>'Mazeh',
            'gov_id'=>$gov1->id

        ]);        
       $gov2= Goverments::create([
            'name' => 'Homs',
           
        ]);

        Branch::create([
            'name'=>'street Tall',
            'gov_id'=>$gov2->id

        ]);
    }
}