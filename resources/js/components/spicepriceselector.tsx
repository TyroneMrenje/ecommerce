
import { useState } from 'react'
import { SpicePrice } from '@/types/spice'

interface Props {
    prices: SpicePrice[] | undefined
}

export default function SpicePriceSelector({ prices }: Props) {

    const saferPrices = prices || []; 
    const [selectedPrice, setSelectedPrice] = useState<SpicePrice | null>(saferPrices.length > 0 ? saferPrices[0] : null) 
     if (!selectedPrice || !prices?.length) return null

    return (
        <div>
            <div className="flex flex-row items-center justify-center gap-2">
                {saferPrices.map((price, index) => (
                   <div key={index} className="text-[11px] text-white size-min">
                     <button
                        onClick={() => setSelectedPrice(price)}
                        className={`px-4 py-2 rounded-lg border-2 font-medium transition-colors
                            ${selectedPrice.weight === price.weight
                                ? 'border-[#a2252a] bg-[#a2252a] text-white'
                                : 'border-gray-300 text-gray-700 hover:border-[#a2252a]'
                            }`}
                    >
                      <p>{price.weight}{price.weight_unit}</p>
                    </button>
                   </div>
                ))}
            </div> 
            <p className="font-medium">Ksh {selectedPrice.price}</p>
        </div>
    )
}