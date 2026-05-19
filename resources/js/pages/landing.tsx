import { Head } from "@inertiajs/react";
import { Spice } from "@/types/spice";
import { Category } from "@/types/category";
import Navbar from "@/components/navbar"; 
import { router } from '@inertiajs/react';
import Footer from "@/components/footer";
import { IoMdSearch } from "react-icons/io";
import { useState } from "react";
import { Link } from "@inertiajs/react";
import {useDebouncedCallback} from 'use-debounce';
import axios from "axios";
interface Props {
    initialspices: Spice[];
    categories:Category[];
    format:{id:number, format:string}[];
}

export default function LandingPage({ initialspices,categories,format }: Props){

    const[isOpen, setIsOpen]=useState(false);
    const[openSort, setIsOpenSort]=useState(false);
    const[loading, setLoading]=useState(false);
    const[searchTerm, setSearchTerm]=useState("");
    const[spices, setSpices] = useState<Spice[]>(initialspices);
    const[selectedCategory, setSelectedCategory] = useState<string | null>(null);
    const[selectedFormat, setSelectedFormat] = useState<string | null>(null);


    const toggleDropdownSort = () =>setIsOpenSort(!openSort);
    const toggleDropdown = () =>setIsOpen(!isOpen);

    async function fetchbyName(value:string){
      if(value.length<2) return
      setLoading(true);

      try{
        const {data} = await axios.get(`/spice`,{
          headers:{
            "Content-Type": "application/json"
          },
          params:{
            spice:value
          }
        });
        if(data.length===0){
        router.visit("/spices/not-found",{
          data:{spice:value}
        })
      }
        setSpices(data);
      } finally{
        setLoading(false)
      }
    }

    const handleSearch = useDebouncedCallback((value: string) => {
        fetchbyName(value)
    }, 2000)

    async function handleCategory(category:string|null){
      if(!category || category.length<2)return
      setLoading(true)
      try{
        const {data} =await axios.get('/spices/category',{
          headers:{
            "Content-Type": "application/json",
          },
          params:{
            category
          }
        });
        setSpices(data);
      }finally{
        setLoading(false)
      }
    }

    function fetchbyCategory(category:string){
      const value = selectedCategory === category ? null : category;
      setSelectedCategory(value);
      handleCategory(value);
    }

    async function fetchbyFormat(format:string | null){
      if(!format ||format.length<2)return
      setLoading(true)
      try{
        const{data}=await axios.get('/spices/format',{
          headers:{
            "content-Type": "application/json"
          },
          params:{
            format
          }        
        });
        setSpices(data);
      }finally{
        setLoading(false)
      }
    }
    function handleFormat(format:string |null){
        const value = selectedFormat === format ? null : format;
        setSelectedFormat(value);
        fetchbyFormat(value);
      }

    return(
       <div className="box-border overflow-hidden scroll-smooth -z-10">
        <Head title="The best spice plug"/>
        <Navbar/>
        <div className="flex flex-col text-center relative  border-b border-gray-300 p-5 space-y-5 bg-[#7b1113] text-white">
            <h1 className="font-bold text-4xl tracking-tight">Take a look at our spices</h1>
            <p className="text-md font-bold ">Kenyan-grown. Kenyan-owned. Non-GMO</p>
            <p style={{fontFamily: 'Caveat Brush, cursive'}} className="text-xl text-balance">Discover ethically sourced, single-origin spices harvested directly from small-scale farmers across the globe.</p>
        </div>
        <div className="flex m-5 gap-4">
            <button onClick={toggleDropdown} className="rounded-2xl p-2 bg-[#eff2f9] border-2">Show filter</button>
            <button onClick={toggleDropdownSort}  className="bg-[#eff2f9] rounded-2xl p-2 border-2">Sort by:</button>
            <input className="border-2 rounded-lg w-70 p-2" placeholder="Enter spices" value={searchTerm} onChange={e => {
              setSearchTerm(e.target.value)
              handleSearch(e.target.value)
             
            }}/>
            <button className="relative right-15" onClick={() => fetchbyName(searchTerm)}><IoMdSearch className="h-6 w-6"/></button>
        </div>     
          { 
            openSort && (
                <div className="flex flex-col absolute md:left-40  bg-red-300 h-40 p-4">
                    <p>Alphabetically, A-Z</p>
                    <p>Best Selling</p>
                </div>
                  )
                }
        <div className="flex">
            {isOpen && (
              <div className="flex px-4">
                  <div className="w-[300px] p-4 border-r border-gray-400 divide-y divide-white/60 flex md:flex-col gap-4">
               
                   <div className="flex flex-row md:flex-col border-b border-gray-400 text-gray-600 space-y-2">
                      <h2 className="font-bold text-xl ">Category</h2>
                  
                        {categories.map((category)=>(
                          <div className="flex flex-row items-center gap-2 mb-5">
                            <input type="checkbox" checked={selectedCategory === category.category} onChange={()=>fetchbyCategory(category.category)} id={`category-${category.id}`} className="w-5 h-5"/>
                            <label htmlFor={`category-${category.id}`} className="text-md">{category.category}</label><br/>
                          </div>              
                        ))}
                   </div>

                   <div className="flex flex-row md:flex-col border-b border-gray-400 text-gray-600 space-y-4">
                    <h2 className="font-bold text-xl">Format</h2>
                    {format.map((form)=>(
                      <div className="flex flex-row items-center gap-2 mb-5">
                        <input type="checkbox" id={`format-${form.id}`} onChange={()=>handleFormat(form.format)} checked={selectedFormat === form.format}  name={form.format} className="w-5 h-5"/>
                        <label htmlFor={`format-${form.id}`} className="text-md">{form.format}</label><br/>
                      </div>
                    ))} 
                   </div>
                </div>
              </div>
            )}

        <div
            className={`grid flex-1 gap-5 mb-5 grid-cols-1 p-10 ${isOpen ? "md:grid-cols-3 lg:grid-cols-3" : "md:grid-cols-4 lg:grid-cols-4"}`}>

            {!loading && spices.length>0 && spices.map((spice) =>(
              <div  key={spice.product_id}  className="shadow-xl border border-gray-300 rounded-lg">
                   <Link href="/spice/${spice.product_id}">
                      <img
                          src={`/storage/${spice.image}`}
                          alt={spice.name}
                          className="w-full object-cover h-64 rounded-lg"
                      />
                   </Link>
                    <div className="text-center">
                        <h2 className="font-semibold text-[#3d4246] text-lg md:text-xl">{spice.name}, {spice.format}</h2>
                        <hr className="my-3 border-gray-200" />
                        <p className="text-[#3d4246] font-medium text-lg"> {spice.category}</p>
                    </div>
                    <div className="flex items-center justify-center m-5">
                        <button className="border border-[#a2252a] border-2 p-2 w-[90%] rounded-lg font-bold text-[#a2252a] hover:text-white hover:bg-[#a2252a]">
                            ADD TO CART
                        </button>
                    </div>
                </div>
            ))}

            {!loading && spices.length===0 && initialspices.map((spice) => (
                <div  key={spice.product_id}  className="shadow-xl border border-gray-300 rounded-lg">
                   <Link href="/spice/${spice.product_id}">
                      <img
                          src={`/storage/${spice.image}`}
                          alt={spice.name}
                          className="w-full object-cover h-64 rounded-lg"
                      />
                   </Link>
                    <div className="text-center">
                        <h2 className="font-semibold text-[#3d4246] text-lg md:text-xl">{spice.name}, {spice.format}</h2>
                        <hr className="my-3 border-gray-200" />
                        <p className="text-[#3d4246] font-medium text-lg"> {spice.category}</p>
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
   <Footer/>
 </div>
         
    )
}