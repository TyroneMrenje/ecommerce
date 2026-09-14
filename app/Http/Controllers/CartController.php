<?php

namespace App\Http\Controllers;

use App\Services\CartService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function __construct(private CartService $cart) {}

    public function index()
    {
        return response()->json([
            'items' => $this->cart->get()->values()->toArray(),
            'total' => $this->cart->total(),
            'count' => $this->cart->count(),
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'spice_id'       => 'required|integer|exists:spices,id',
            'spice_price_id' => 'required|integer|exists:spice_price,id',
            'quantity'       => 'integer|min:1',
        ]);


        $priceDetails = DB::table('spice_price')
            ->join('spices', 'spice_price.spice_id', '=', 'spices.id')
            ->select(
                'spices.name',
                'spice_price.price',
                'spice_price.weight',
                'spice_price.weight_unit',
            )
            ->where('spice_price.id', $request->spice_price_id)
            ->first();

        $this->cart->add(
            spiceId:      $request->spice_id,
            spicePriceId: $request->spice_price_id,
            price:        $priceDetails->price,
            name:         $priceDetails->name,
            weight:       $priceDetails->weight,
            weightUnit:   $priceDetails->weight_unit,
            quantity:     $request->input('quantity', 1),
        );

        return response()->json([
            'message' => 'Added to cart',
            'count'   => $this->cart->count(),
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'spice_id'       => 'required|integer',
            'spice_price_id' => 'required|integer',
            'quantity'       => 'required|integer|min:0',
        ]);

        $this->cart->update(
            $request->spice_id,
            $request->spice_price_id,
            $request->quantity
        );

        return response()->json([
            'items' => $this->cart->get()->values()->toArray(),
            'total' => $this->cart->total(),
            'count' => $this->cart->count(),
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate([
            'spice_id'       => 'required|integer',
            'spice_price_id' => 'required|integer',
        ]);

        $this->cart->remove($request->spice_id, $request->spice_price_id);

        return response()->json([
            'items' => $this->cart->get()->values()->toArray(),
            'total' => $this->cart->total(),
            'count' => $this->cart->count(),
        ]);
    }

    public function clear()
    {
        $this->cart->clear();
        return response()->json(['message' => 'Cart cleared']);
    }
}