<?php

namespace App\Http\Controllers;

use App\Models\Spice;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Http\Request;


class SpiceController extends Controller
{
    //
    public function allSpices(Spice $spice){
         return $spice->all();
    }

    public function getAllSpice(){
        $spiceDescription = DB::table('spice_description')
        ->join('spices', 'spice_description.spices_id', '=','spices.id')
        ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
        ->select('spices.name','spices.id as product_id', 'spice_description.image','spice_format.format')
        ->orderBy('spices.name', 'asc');

        $spice_category = DB::table('spice_group')
        ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id')
        ->select('spice_group.spice_id as product_id', DB::raw("string_agg(spice_category.category, ',') as category"))
        ->groupBy('spice_group.spice_id');

        $spices= DB::query()
        ->fromSub($spiceDescription, 'spice_description')
        ->leftJoinSub($spice_category, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
        ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
        ->orderBy('spice_description.name', 'asc')
        ->get();
        
        
        return Inertia::render('landing',[
            'spices'=> $spices
        ]);
 }
}
