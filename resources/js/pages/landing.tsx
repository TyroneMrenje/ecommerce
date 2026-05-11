import { Head } from "@inertiajs/react";
import { Spice } from "@/types/spice";
import Navbar from "@/components/navbar"; 
import Footer from "@/components/footer";
import { useState } from "react";
 
interface Props {
    spices: Spice[];
}

export default function LandingPage({ spices }: Props){

    const[isOpen, setIsOpen]=useState(false);
    const toggleDropdown = () =>setIsOpen(!isOpen);

    return(
       <div className="box-border overflow-hidden scroll-smooth -z-10">
        <Head title="The best spice plug"/>
        <Navbar/>
        <div className="flex flex-col relative h-30 p-5 md:mt-20 border-b border-gray-100">
            <h1 className="font-medium text-4xl tracking-tight">Take a look at our spices</h1>
            <p className="text-lg text-balance text-[#7f2629]">Discover ethically sourced, single-origin spices harvested directly from small-scale farmers across the globe.</p>
        </div>
        <div className="flex justify-between md:mx-10">
            <button onClick={toggleDropdown} className="rounded-2xl p-4 bg-[#eff2f9]">Show filter</button>
            <button className="bg-[#eff2f9] rounded-2xl p-4">Sort by:</button>
        </div>
        <div className="flex">

            {isOpen && (
                <div className="w-[250px] min-h-screen bg-red-500 p-5 flex md:flex-col gap-4">
                    <p>Category</p>
                    <p>Spices</p>
                    <p>Herbs</p>
                    <p>Seasoning</p>
                </div>
            )}
        <div
            className={`grid flex-1 gap-5 m-10
            grid-cols-1
            md:grid-cols-3
            lg:${isOpen ? "grid-cols-3" : "grid-cols-4"}`}
        >
            {spices.map((spice) => (
                <div  key={spice.product_id}  className="shadow-xl border-gray-400 rounded-lg">
                    <img
                        src={`/storage/${spice.image}`}
                        alt={spice.name}
                        className="w-full object-cover h-64 rounded-lg"
                    />
                    <div className="text-center">
                        <h2 className="font-semibold text-[#3d4246] text-lg md:text-xl">{spice.name}, {spice.format}</h2>
                        <hr className="my-3 border-gray-200" />
                        <p className="text-[#3d4246] font-bold text-lg"> {spice.category}</p>
                    </div>
                    <div className="flex items-center justify-center m-5">
                        <button className="border border-[#a2252a] border-2 p-2 w-[90%] rounded-lg font-bold text-[#a2252a] hover:text-white hover:bg-[#a2252a]">
                            ADD TO CART
                        </button>
                    </div>
                </div>
            ))}
        </div>
    </div>
 </div>
         
    )
}