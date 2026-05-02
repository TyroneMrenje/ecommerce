<?php

namespace Database\Seeders;

use App\Models\SpiceCategory as SpiceCategoryModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpiceCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categories=["Sweet","Pungent","Spicy","Woody","Cooling","Earthy","Bitter","Nutty","Sour","Herby",];

        foreach($categories as $category){
            SpiceCategoryModel::firstOrCreate(['category'=>$category]);
        }
    }
}
