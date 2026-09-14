
export interface CartItem {
    id: number
    spice_id: number
    spice_price_id: number
    name: string
    price: number
    weight: string
    weight_unit: string
    quantity: number
}

export interface CartState {
    items: CartItem[]
    total: number
    count: number
}