
import { useCart } from '@/components/cart'
import { Link } from '@inertiajs/react'

export default function CartPage() {

    const { cart, loading, updateQuantity, removeItem, clearCart } = useCart()

    if (cart.items.length === 0) {
        return (
            <div className="flex flex-col items-center justify-center h-screen gap-4">
                <p className="text-xl text-gray-500">Your cart is empty</p>
                <Link href="/" className="text-[#a2252a] underline">
                    Continue shopping
                </Link>
            </div>
        )
    }

    return (
        <div className="max-w-4xl mx-auto p-8">
            <div className="flex justify-between items-center mb-6">
                <h1 className="text-2xl font-bold">Your Cart</h1>
                <button
                    onClick={clearCart}
                    className="text-sm text-red-500 hover:underline"
                >
                    Clear cart
                </button>
            </div>

            <div className="flex flex-col gap-4">
                {cart.items.map(item => (
                    <div
                        key={item.id}
                        className="flex items-center justify-between border border-gray-200 rounded-lg p-4"
                    >
                        <div>
                            <h2 className="font-semibold">{item.name}</h2>
                            <p className="text-sm text-gray-500">
                                {item.weight}{item.weight_unit}
                            </p>
                            <p className="text-[#a2252a] font-bold">${item.price}</p>
                        </div>


                        <div className="flex items-center gap-3">
                            <button
                                onClick={() => updateQuantity(item.spice_price_id, item.quantity - 1)}
                                disabled={loading}
                                className="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100"
                            >
                                −
                            </button>
                            <span className="font-medium w-6 text-center">
                                {item.quantity}
                            </span>
                            <button
                                onClick={() => updateQuantity(item.spice_price_id, item.quantity + 1)}
                                disabled={loading}
                                className="w-8 h-8 border border-gray-300 rounded-lg hover:bg-gray-100"
                            >
                                +
                            </button>
                        </div>

                        <div className="text-right">
                            <p className="font-bold">
                                ${(item.price * item.quantity).toFixed(2)}
                            </p>
                            <button
                                onClick={() => removeItem(item.spice_price_id)}
                                className="text-sm text-red-500 hover:underline mt-1"
                            >
                                Remove
                            </button>
                        </div>
                    </div>
                ))}
            </div>

            {/* total + checkout */}
            <div className="border-t border-gray-200 mt-6 pt-6 flex justify-between items-center">
                <div>
                    <p className="text-sm text-gray-500">Total</p>
                    <p className="text-2xl font-bold">${cart.total.toFixed(2)}</p>
                </div>
                <Link
                    href="/checkout"
                    className="bg-[#a2252a] text-white px-8 py-3 rounded-lg font-bold hover:bg-[#8a1e22]"
                >
                    Proceed to Checkout
                </Link>
            </div>
        </div>
    )
}