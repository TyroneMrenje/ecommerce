<?php

namespace Database\Seeders;

use App\Models\Spice;
use App\Models\SpiceCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $spicewithcategories=[
            'Almond-extract'=>['Sweet','Nutty'],
            'Anise'=>['Sweet','Pungent'],
            'Basil'=>['Herby','Cooling'],
            'Bay leaves'=>['Herby','Bitter'],
            'Cardamom'=>['Sweet','Pungent','Woody']
        ];

        foreach($spicewithcategories as $spice => $categories){
            $spicez= Spice::firstOrCreate(['name'=>$spice]);
            $categoryIds=[];

            foreach($categories as $cat){
                $category=SpiceCategory::where('category', $cat)->first();

                if($category){
                    $categoryIds[]=$category->id;
                }
                
            }
            if(!empty($categoryIds)){
                $spicez->spice_categories()->syncWithoutDetaching($categoryIds);
            }
            
          
    }
    }
}