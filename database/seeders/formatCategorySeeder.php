<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\SpiceCategory;
use App\Models\SpiceFormat;

class formatCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        $categories=["Sweet","Pungent","Spicy","Woody","Cooling","Earthy","Bitter","Nutty","Sour","Herby"];
        $formats=["Whole","Ground","Blend","Powdered","Herbaceous","Liquid"];

        foreach($categories as $category){

            $slugz=Str::slug($category);
            SpiceCategory::where('category',$category)->update([
                'slug'=>$slugz
            ]);
        }

        foreach($formats as $format){
            $slugz=Str::slug($format);
            SpiceFormat::where('format',$format)->update([
                'slug'=>$slugz
            ]);
        }     
     }
 }
