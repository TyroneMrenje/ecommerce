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
        <div className="box-border overflow-hidden scroll-smooth">
            <Head title="The itty bitty details"/>
            <Navbar/>
                    <div className="text-gray-900">
                        <h2>{spiceDetails.name}</h2>
                        <p>{spiceDetails.description}</p>
                        <p>{spiceDetails.recommendation}</p>
                        <h2>{spiceDetails.weight}</h2>
                        <p>{spiceDetails.weight_unit}</p>
                        <p>{spiceDetails.price}</p>
                        <img src={`/storage/${spiceDetails.image}`}/>

         </div>
        </div>
    )
}