
import { useState, useEffect } from 'react'
import axios from 'axios'
import { CartItem, CartState } from '@/types/cart'

export function useCart() {
    const [cart, setCart] = useState<CartState>({
        items: [],
        total: 0,
        count: 0,
    })
    const [loading, setLoading] = useState(false)

    
    useEffect(() => {

        const controller = new AbortController()

        async function fetchCart() {
            try {
                const { data } = await axios.get('/cart', {
                    signal: controller.signal 
                })
                setCart(data)
            } catch (error: any) {
                if (axios.isCancel(error)) return 
                console.error('Failed to fetch cart:', error)
            }
        }

        fetchCart()

        return () => controller.abort()

    }, [])

    async function fetchCart() {
        try {
            const { data } = await axios.get('/cart')
            setCart(data)
        } catch (error) {
            console.error('Failed to fetch cart:', error)
        }
    }

    async function addToCart(
        spiceId: number,
        spicePriceId: number,
        quantity: number = 1
    ) {
        setLoading(true)
        try {
            await axios.post('/cart/add', {
                spice_id:       spiceId,
                spice_price_id: spicePriceId,
                quantity,
            })
            await fetchCart() 
        } catch (error) {
            console.error('Failed to add to cart:', error)
        } finally {
            setLoading(false)
        }
    }

    async function updateQuantity(spicePriceId: number, quantity: number) {
        setLoading(true)
        try {
            const { data } = await axios.patch('/cart/update', {
                spice_price_id: spicePriceId,
                quantity,
            })
            setCart(data)
        } catch (error) {
            console.error('Failed to update cart:', error)
        } finally {
            setLoading(false)
        }
    }

    async function removeItem(spicePriceId: number) {
        setLoading(true)
        try {
            const { data } = await axios.delete('/cart/remove', {
                data: { spice_price_id: spicePriceId } 
            })
            setCart(data)
        } catch (error) {
            console.error('Failed to remove item:', error)
        } finally {
            setLoading(false)
        }
    }

    async function clearCart() {
        setLoading(true)
        try {
            await axios.delete('/cart/clear')
            setCart({ items: [], total: 0, count: 0 })
        } catch (error) {
            console.error('Failed to clear cart:', error)
        } finally {
            setLoading(false)
        }
    }

    return {
        cart,
        loading,
        addToCart,
        updateQuantity,
        removeItem,
        clearCart,
    }
}