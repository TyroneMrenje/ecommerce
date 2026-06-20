<?php

namespace Database\Seeders;

use App\Models\SpiceFormat as SpiceFormatModel;
use App\Models\SpicePrice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpicePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          $prices=[
            "Liquid"=>[[20,129.00],[100,337.00],[250,497.00]],
            
        ];

        foreach($prices as $format =>$priceList){
            $formatId=SpiceFormatModel::where('format',$format)->first();

            foreach($priceList as [$weight,$price]){

                SpicePrice::firstOrCreate([
                    'spice_format_id'=>$formatId->id,
                    'weight'=>$weight
                ],
                [
                    'price'=>$price,
                    'weight_unit'=>'ml'
                ]
                );
            
            }
        }
    }
}
