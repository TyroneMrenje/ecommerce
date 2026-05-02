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
            "Whole"=>[[20,84.00],[50,194.00],[80,297.00],[150,345.00]],
            "Ground"=>[[15,76,00],[37,150.00],[59,240.00],[110,450.00]],
            "Blend"=>[[60,220.00],[90,330.00],[130,440.00]],
            "Herbaceous"=>[[10,40.00]]
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
                    'weight_unit'=>'g'
                ]
                );
            
            }
        }
    }
}
