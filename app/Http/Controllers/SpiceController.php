<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Http\Request;



class SpiceController extends Controller
{
    public function getAllSpice(){
        $spiceDescription = DB::table('spice_description')
        ->join('spices', 'spice_description.spices_id', '=','spices.id')
        ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
        ->select('spices.name','spices.id as product_id', 'spice_description.image','spice_format.format')
        ->orderBy('spices.name', 'asc');

        $spice_category = DB::table('spice_group')
        ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id')
        ->select('spice_group.spice_id as product_id', DB::raw("string_agg(spice_category.category, '  ') as category"))
        ->groupBy('spice_group.spice_id');

        $spices= DB::query()
        ->fromSub($spiceDescription, 'spice_description')
        ->leftJoinSub($spice_category, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
        ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
        ->orderBy('spice_description.name','asc')
        ->get();
        
        
        return Inertia::render('landing',[
            'spices'=> $spices
        ]);
 }

    public function searchbyCategory(Request $request){
       
        $request->validate([
            'category' => 'required|string|max:100|exists:spice_category,category',
        ]);

       $category= $request->input('category');
       
       $spiceDescription = DB::table('spice_description')
        ->join('spices', 'spice_description.spices_id', '=','spices.id')
        ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
        ->select('spices.name','spices.id as product_id', 'spice_description.image','spice_format.format')
        ->orderBy('spices.name', 'asc');


        $spiceCategory = DB::table('spice_group')
        ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id') 
        ->select(
            'spice_group.spice_id as product_id',
            DB::raw("string_agg(spice_category.category, ', ') as category")
        )
        ->where('spice_category.category','like', "%{$category}%") 
        ->groupBy('spice_group.spice_id');



        $results= DB::query()
        ->fromSub($spiceDescription, 'spice_description')
        ->leftJoinSub($spiceCategory, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
        ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
        ->orderBy('spice_description.name','asc')
        ->get();

        return Inertia::render('landing',[
            'category'=> $results
        ]);

        
    }


    public function searchbyFormat(Request $request){

        $request->validate([
            'format' => 'required|string|max:100|exists:spice_format,format',
        ]);

        $format=$request->input('format');

        $spiceDescription = DB::table('spice_description')
        ->join('spices', 'spice_description.spices_id', '=','spices.id')
        ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
        ->select('spices.name','spices.id as product_id', 'spice_description.image','spice_format.format')
        ->where('spice_format.format', 'like', "%{$format}%")
        ->orderBy('spices.name', 'asc');

         $spiceCategory = DB::table('spice_group')
        ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id')
        ->select('spice_group.spice_id as product_id', DB::raw("string_agg(spice_category.category, '  ') as category"))
        ->groupBy('spice_group.spice_id');

        $results= DB::query()
        ->fromSub($spiceDescription, 'spice_description')
        ->leftJoinSub($spiceCategory, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
        ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
        ->orderBy('spice_description.name','asc')
        ->get();

        return Inertia::render('landing',[
            'result'=> $results,
            'filters'=>[
                'format'=>$format
            ]
        ]);
    }

    public function searchForSpice(Request $request){

      $request->validate([
            'spice' => 'required|string|max:100|exists:spices,name',
        ]);

      $spice= $request->input('spice');

      $spiceDescription = DB::table('spice_description')
        ->join('spices', 'spice_description.spices_id', '=','spices.id')
        ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
        ->select('spices.name','spices.recommendation','spices.description','spices.id as product_id', 'spice_description.image','spice_format.format')
        ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$spice])
        ->orderByRaw("ts_rank(search_vector, plainto_tsquery('english', ?)) desc", [$spice])
        ->orderBy('spices.name', 'asc');

     $spice_category = DB::table('spice_group')
        ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id')
        ->select('spice_group.spice_id as product_id', DB::raw("string_agg(spice_category.category, '  ') as category"))
        ->groupBy('spice_group.spice_id');

        

    







    }
}
