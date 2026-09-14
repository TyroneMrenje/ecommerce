<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartService
{
    private Cart $cart;

    public function __construct(private Request $request)
    {
        $this->cart = $this->resolve();
    }

    private function resolve(): Cart
    {
        if (Auth::check()) {
            return Cart::firstOrCreate(['user_id' => Auth::id()]);
        }

        return Cart::firstOrCreate([
            'session_id' => $this->request->session()->getId()
        ]);
    }

    public function get(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->cart->items()->get();
    }

    public function add(
        int $spiceId,
        int $spicePriceId,
        float $price,
        string $name,
        string $weight,
        string $weightUnit,
        int $quantity = 1
    ): void {
        $existing = $this->cart->items()
            ->where('spice_price_id', $spicePriceId)
            ->first();

        if ($existing) {

            $existing->increment('quantity', $quantity);
        } else {
            $this->cart->items()->create([
                'spice_id'       => $spiceId,
                'spice_price_id' => $spicePriceId,
                'price'          => $price,
                'name'           => $name,
                'weight'         => $weight,
                'weight_unit'    => $weightUnit,
                'quantity'       => $quantity,
            ]);
        }
    }

    public function update(int $spicePriceId, int $quantity): void
    {
        $item = $this->cart->items()
            ->where('spice_price_id', $spicePriceId)
            ->first();

        if (!$item) return;

        if ($quantity <= 0) {
            $item->delete(); 
            return;
        }

        $item->update(['quantity' => $quantity]);
    }

    public function remove(int $spicePriceId): void
    {
        $this->cart->items()
            ->where('spice_price_id', $spicePriceId)
            ->delete();
    }

    public function clear(): void
    {
        $this->cart->items()->delete();
    }

    public function total(): float
    {
        return $this->cart->items()
            ->sum(DB::raw('price * quantity'));
    }

    public function count(): int
    {
        return $this->cart->items()->sum('quantity');
    }



    public function mergeGuestCart(string $sessionId): void
    {
        $guestCart = Cart::where('session_id', $sessionId)->first();

        if (!$guestCart) return;

        $guestCart->items->each(function ($item) {
            $existing = $this->cart->items()
                ->where('spice_price_id', $item->spice_price_id)
                ->first();

            if ($existing) {
                $existing->increment('quantity', $item->quantity);
            } else {
                $this->cart->items()->create(
                    $item->only([
                        'spice_id',
                        'spice_price_id',
                        'price',
                        'name',
                        'weight',
                        'weight_unit',
                        'quantity',
                    ])
                );
            }
        });

        $guestCart->delete(); 
    }
}