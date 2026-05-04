<?php

namespace Database\Seeders;

use App\Models\SpiceDescription;
use App\Models\SpiceFormat;
use App\Models\Spice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpiceDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $spiceWithDecriptions=[

            ['name' =>'Cocoa', 'format'=> 'Ground', 'image'=> 'spices/cocoa_powder.webp'],

            ['name'=>'Cream of Tartar', 'format'=>'Powdered', 'image'=>'spices/creamof_tartar.webp'],

            ['name'=>'Cumin', 'format'=>'Ground', 'image'=> 'spices/cumin.webp'],

            ['name'=>'Dill Weed', 'format'=>'Herbaceous', 'image'=>'spices/dill_weed.jpg'],

            ['name'=>'Fennel Seeds', 'format'=>'Whole', 'image'=>'spices/fennel.jpg'],

            ['name'=>'Fish Sauce', 'format'=>'Liquid', 'image'=>'spices/fish_sauce.jpg'],

            ['name'=>'Dehydrated Garlic', 'format'=>'Whole', 'image'=>'spices/garlic_dehydrated.webp'],

            ['name'=>'Crystallized Ginger', 'format'=>'Whole', 'image'=>'spices/crystal_ginger.jpg'],

            ['name'=>'Ginger Powder', 'format'=>'Ground', 'image'=>'spices/ground_ginger.jpg'],

            ['name'=>'Herbs de Provence', 'format'=>'Blend', 'image'=>'spices/herb_de_provence.webp'],

            ['name'=>'Lemon Extract', 'format'=>'Liquid', 'image'=>'spices/lemon_extract.jpeg'],

            ['name'=>'Mustard Seed', 'format'=>'Whole', 'image'=>'spices/mustard_seeds.png'],

            ['name'=>'Mustard Seed', 'format'=>'Ground', 'image'=>'spices/ground_mustard.webp'],

            ['name'=>'Lemon Pepper', 'format'=>'Blend', 'image'=>'spices/lemon_pepper.jpg'],

            ['name'=>'Nutmeg', 'format'=>'Ground', 'image'=>'spices/ground-nutmeg.jpg'],

            ['name'=>'Marjoram', 'format'=>'Herbaceous', 'image'=> 'spices/marjoram.jpg']

          

        ];
        
        foreach($spiceWithDecriptions as $spiceDescription){
            $spice=Spice::where('name', $spiceDescription['name'])->first();
            if($spice){
                $format=SpiceFormat::where('format', $spiceDescription['format'])->first();

                if(!$format){
                    continue;
                }

                $formatId=$format->id;

                SpiceDescription::firstOrCreate([
                    'spices_id' => $spice->id,
                    'spice_format_id' => $formatId,
                
                ],
                [
                    'image' => $spiceDescription['image']
                ]
             );
            }

        }
    }
}
