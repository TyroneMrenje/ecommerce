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
            ['name' => 'Almond-extract', 'format'=> 'Whole', 'image'=> 'spices/almondwhole.jpg'],

            ['name' => 'Almond-extract', 'format' => 'Liquid', 'image'=>'spices/almond-liquid.webp'],

            ['name' => 'Anise', 'format' => 'Whole', 'image' => 'spices/anise.jpg'],

            ['name' => 'Basil', 'format' => 'Herbaceous' , 'image'=>'spices/basil.webp' ],

            ['name' =>'Bay leaves', 'format' => 'Herbaceous','image'=>'spices/bayleaf.jpeg'],

            ['name'=>'Cardamom', 'format' => 'Whole','image'=>'spices/cardamom_whole.jpeg'],

            ['name'=>'Cardamom', 'format' => 'Ground','image'=>'spices/cardamom_ground.png'],


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
