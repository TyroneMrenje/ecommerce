import React from "react";
import { Head,Link } from '@inertiajs/react';
import Navbar from "@/components/navbar";
import Footer  from "@/components/footer";
import { useState} from "react";
import axios from "axios";
import { SpiceDetails } from "@/types/spice";


interface Props{
    spiceDetails:SpiceDetails
}

export default function SpicePage({spiceDetails}:Props){

    return(
        <div className="box-border overflow-hidden scroll-smooth -z-10">
            <Head title="The itty bitty details"/>
            <Navbar/>
            <div className="flex md:flex-row justify-around relative p-10 text-gray-900 bg-[#f5f5f5] w-full h-screen">
                <div className="h-130 backdrop-blur rounded-lg shadow-lg border border-gray-200 w-[45%]">
                     <img src={`/storage/${spiceDetails.image}`} className="w-full h-full aspect-auto rounded-lg object-cover"/>
                </div>
                <div className="flex flex-col relative right-4 items-start  md:w-[45%] h-100">
                    <h1 style={{fontFamily: 'JetBrains Mono Variable, monospace'}} className="md:text-4xl font-bold">{spiceDetails.name}</h1>
                    <p className=" text-md text-pretty md:text-balanced py-4">{spiceDetails.description}</p>
                    <p>Recommended uses: {spiceDetails.recommendation}</p>
                    {spiceDetails.prices.map((price,index)=>(
                        <div key={index} className="flex flex-row  bg-red-300 ">

                            <p> {price.weight} {price.weight_unit}</p>
                        </div>
                    ))}
                </div>
           </div>
           <Footer/>
        </div>
    )
}