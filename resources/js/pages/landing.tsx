import { Head } from "@inertiajs/react";
import { Spice } from "@/types/spice";
 
interface Props {
    spices: Spice[];
}

export default function LandingPage({ spices }: Props){
    return(
         <div>
            <Head title="The best spice plug"/>
              {spices.map((spice) => (
                <div key={spice.product_id}>
                    <img src={`/storage/${spice.image}`} alt={spice.name} />
                    <h2>{spice.name}</h2>
                    <p>{spice.format}</p>
                    <p>{spice.category ?? 'Uncategorized'}</p>
                </div>
            ))}
           
        </div>
      
    )
}