import { Head } from "@inertiajs/react";
import { Spice } from "@/types/spice";
import Navbar from "@/components/navbar"; 
 
interface Props {
    spices: Spice[];
}

export default function LandingPage({ spices }: Props){
    return(
       <div className="box-border overflow-hidden scroll-smooth bg-[#eff2f9]">
        <Head title="The best spice plug"/>
        <Navbar/>
        <div className="flex flex-col relative h-30 p-5 md:mt-20 border-b border-gray-100">
            <h1 className="font-medium text-4xl tracking-tight">Take a look at our spices</h1>
            <p className="text-lg text-balance text-[#7f2629]">Discover ethically sourced, single-origin spices harvested directly from small-scale farmers across the globe.</p>
        </div>
        <div className="flex justify-between mx-10">
            <button>Show filter</button>
            <button>Sort by:</button>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 m-10 gap-5 relative ">
            {spices.map((spice) => (
            <div key={spice.product_id} className="shadow-xl border-gray-300 rounded-lg">
                <img src={`/storage/${spice.image}`} alt={spice.name}  className="w-full aspect-square rounded-lg m-2"/>
                <div className="text-center">
                    <h2 className=" font-semibold text-[#3d4246] text-lg ">{spice.name},&nbsp;&nbsp;{spice.format}</h2>
                    <hr className="border-t border-gray-700"></hr> 
                     {spice.category?.split("  ").map((category, index) => (
                        
                         <p key={index} className="font-semibold">{category ?? 'N/A'}</p>
                                        
                    ))}    
                </div>
                <div className="flex items-center justify-center m-5 ">
                   <button className="border border-[#a2252a] border-4 p-2 w-[90%] rounded-lg font-bold text-[#a2252a]">ADD TO CART</button>
                </div>
            </div>
           ))}
       </div>  
     </div>
      
    )
}