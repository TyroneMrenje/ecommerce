export interface Spice {

    product_id:number;
    name:string;
    image:string;
    format:string;
    category:string | null;
    recommendation:string;
    description:string;
    prices:SpicePrice[]
   
}

export interface PaginatedSpice {

    data:Spice[]
    current_page: number
    last_page: number
    per_page: number
    total: number
    links: Array<any>
}

export interface SpicePrice{
    price:number
    weight: number
    weight_unit: string
}


export interface SpiceDetails {
    product_id: number
    name: string
    description: string
    recommendation: string
    image: string
    format: string
    category: string | null
    prices:SpicePrice[]
    
}
