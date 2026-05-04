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
    
            'Cocoa'=>['Sweet','Nutty','Woody'],
            'Cream of Tartar'=>['Sour','Bitter','Pungent'],
            'Cumin'=>['Earthy','Spicy','Bitter'],
            'Dill Weed'=>['Herby'],
            'Fennel Seeds'=>['Sweet','Sour'],
            'Fish Sauce'=>['Spicy','Pungent'],
            'Dehydrated Garlic'=>['Pungent','Bitter'],
            'Crystallized Ginger'=>['Spicy','Earthy',],
            'Ginger Powder'=>['Earthy',"Bitter"],
            'Herbs de Provence'=>['Herby','Sweet'],
            'Lemon Extract'=>['Sour','Cooling'],
            'Lemon Pepper'=>['Sour','Spicy'],
            'Mustard Seed'=>['Earthy','Nutty'],
            'Nutmeg'=>['Sweet','Nutty','Woody'],
            'Marjoram'=>['Herby','Earthy']

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