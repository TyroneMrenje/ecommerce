<?php

namespace Database\Seeders;

use App\Models\SpiceFormat as SpiceFormatModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpiceFormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $formats=["Whole","Ground", "Blend","Herbaceous","Liquid"];

        foreach($formats as $format){
            SpiceFormatModel::firstOrCreate(['format' => $format]);
        }
    }
}
