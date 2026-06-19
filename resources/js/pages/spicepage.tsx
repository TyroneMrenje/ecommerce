import React from "react";
import { Head,Link } from '@inertiajs/react';
import Navbar from "@/components/navbar";
import Footer  from "@/components/footer";
import { useState} from "react";
import axios from "axios";
import { SpiceDetails } from "@/types/spice";
import { IoIosArrowUp } from "react-icons/io";
import { IoIosArrowDown } from "react-icons/io";


interface Props{
    spiceDetails:SpiceDetails
}

export default function SpicePage({spiceDetails}:Props){

    const[count,setCount]= useState<number>(0);
    
    const prev=() =>{

        setCount(count-1)
    }

    const next=()=>{
        setCount(count+1)
    }

    return(
        <div className="box-border overflow-hidden scroll-smooth -z-10">
            <Head title="The itty bitty details"/>
            <Navbar/>
            <div className="flex flex-col lg:flex-row justify-around relative p-10 text-gray-900 bg-[#e5e5e5]">
                <div className="h-90 md:h-130 lg:h-130 backdrop-blur rounded-lg shadow-lg border border-gray-200 lg:w-[50%]">
                     <img src={`/storage/${spiceDetails.image}`} className="w-full h-full aspect-square md:aspect-auto rounded-lg object-cover z-50 "/>
                </div>

                <div className="flex flex-col relative  items-start lg:w-[45%]">
                    <div className="border-b border-gray-600 py-8 w-full">
                        <h2 style={{fontFamily: 'JetBrains Mono Variable, monospace'}}  className="md:font-semibold bg-gray-900 text-gray-200 size-min px-[3px] mb-2">{spiceDetails.format}</h2>
                        <h1 style={{fontFamily: 'JetBrains Mono Variable, monospace'}} className=" text-xl md:text-4xl font-black">{spiceDetails.name}</h1>                
                    </div>
                   <div className="border-b border-gray-600 pb-8">
                        <p className="text-sm md:text-md text-pretty tracking-wide py-4">{spiceDetails.description}</p>
                        <p className="py-2">Recommended uses: {spiceDetails.recommendation}</p>
                        <p>Categories: {spiceDetails.category}</p>
                    </div>
                    <div className="flex flex-col space-y-2 items-center justify-center w-full ">            
                     <h1>Sizes</h1>
                     <div className="flex flex-row items-center justify-center gap-3">                 
                        {spiceDetails.prices.map((price,index)=>(
                        <div key={index} className="">
                            <button className="bg-gray-900 text-gray-200 px-[6px]">{price.weight}{price.weight_unit}</button>
                        </div>
                     ))}
                    </div>
                    </div>
                    <div className="flex flex-col w-full items-center justify-center">
                        <div className="flex flex-row items-center justify-center my-6 gap-2">
                            <button disabled={count <= 0} onClick={prev}><IoIosArrowDown/></button>
                            <p>Quantity:{count}</p>
                            <button onClick={next}><IoIosArrowUp /></button>
                        </div>
                        <button style={{fontFamily: 'JetBrains Mono Variable, monospace'}} className="bg-gray-900 text-white px-4 h-10 w-70 rounded-lg transition delay-100 duration-250 ease-in-out  hover:scale-110 hover:bg-white hover:text-gray-900">ADD TO CART</button>                      
                    </div>
                </div>
           </div>
             <Footer/>        
        </div>
    )
}