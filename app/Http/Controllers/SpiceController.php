<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Illuminate\Http\Request;



class SpiceController extends Controller
{
        public function getAllSpice(){

            $categories= DB::table('spice_category')
            ->select('id','category')
            ->orderBy('category', 'asc')
            ->get();

            $format= DB::table('spice_format')
            ->select('id','format')
            ->orderBy('format', 'asc')
            ->get();

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
            ->paginate(20);
            
            
            return Inertia::render('landing',[
                'initialspices'=> $spices,
                'categories'=> $categories,
                'format'=> $format
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
            ->JoinSub($spiceCategory, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
            ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
            ->orderBy('spice_description.name','asc')
            ->get();

            return response()->json($results);
            
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
            ->JoinSub($spiceCategory, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
            ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
            ->orderBy('spice_description.name','asc')
            ->get();

            return response()->json($results);
        }

        public function searchForSpice(Request $request){

        $request->validate([
                'spice' => 'required|string|max:100',
            ]);

        $spice= $request->input('spice');

        $spiceDescription = DB::table('spice_description')
            ->join('spices', 'spice_description.spices_id', '=','spices.id')
            ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
            ->select('spices.name','spices.id as product_id', 'spice_description.image','spice_format.format')
            ->whereRaw("search_vector @@ plainto_tsquery('english', ?)", [$spice])
            ->orderByRaw("ts_rank(search_vector, plainto_tsquery('english', ?)) desc", [$spice])
            ->orderBy('spices.name', 'asc')
            ->limit(20);

        $spice_category = DB::table('spice_group')
            ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id')
            ->select('spice_group.spice_id as product_id', DB::raw("string_agg(spice_category.category, '  ') as category"))
            ->groupBy('spice_group.spice_id');

        $results= DB::query()
            ->fromSub($spiceDescription, 'spice_description')
            ->leftJoinSub($spice_category, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
            ->select('spice_description.product_id','spice_description.name', 'spice_description.image', 'spice_description.format', 'spice_category.category')
            ->orderBy('spice_description.name','asc')
            ->get();

            return response()->json($results);
        }

        public function getSpiceDetails(Request $request, int $id, string $format){

        abort_if(!is_numeric($id), 400);
        abort_if(!DB::table('spices')->where('id', $id)->exists(), 404);
        abort_if(!DB::table('spice_format')->where('format', $format)->exists(), 404);

        $spiceDescription = DB::table('spice_description')
            ->join('spices', 'spice_description.spices_id', '=','spices.id')
            ->join('spice_format', 'spice_description.spice_format_id', '=', 'spice_format.id')
            ->select('spices.name','spices.recommendation','spices.description','spices.id as product_id', 'spice_description.image','spice_format.format','spice_description.spice_format_id')
            ->where("spices.id", $id)
            ->where("spice_format.format", $format)
            ->orderBy('spices.name', 'asc');
        
        $spicePrices= DB::table('spice_price')
            ->join('spice_format', 'spice_price.spice_format_id', '=', 'spice_format.id')
            ->select('spice_price.spice_format_id',
             DB::raw("json_agg(json_build_object('price', spice_price.price, 'weight', spice_price.weight, 'weight_unit', spice_price.weight_unit)) as prices"))
            ->where('spice_format.format',$format)
            ->groupBy('spice_price.spice_format_id');

        $spice_category = DB::table('spice_group')
            ->join('spice_category', 'spice_group.spice_category_id', '=', 'spice_category.id')
            ->select('spice_group.spice_id as product_id', DB::raw("string_agg(spice_category.category, '  ') as category"))
            ->groupBy('spice_group.spice_id');

            $results= DB::query()
            ->fromSub($spiceDescription, 'spice_description')
            ->joinSub($spicePrices,'spice_price', 'spice_price.spice_format_id', '=', 'spice_description.spice_format_id')
            ->JoinSub($spice_category, 'spice_category', 'spice_description.product_id', '=', 'spice_category.product_id')
            ->select('spice_description.product_id','spice_price.spice_format_id','spice_price.prices','spice_description.name', 'spice_description.description','spice_description.recommendation', 'spice_description.image', 'spice_description.format', 'spice_category.category')
            ->orderBy('spice_description.name','asc')
            ->first();


          $results->prices = json_decode($results->prices, true) ?? [];

            return inertia::render('spicepage',[
                'spiceDetails'=>$results
            ]);        
        }

        public function notFound(Request $request)
    {
        return Inertia::render('notfound', [
            'searchTerm' => $request->input('spice')
        ]);
    }
}
