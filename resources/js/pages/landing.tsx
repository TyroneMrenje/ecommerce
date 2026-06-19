import { Head } from "@inertiajs/react";
import { PaginatedSpice,Spice } from "@/types/spice";
import { Category } from "@/types/category";
import Navbar from "@/components/navbar"; 
import { router } from '@inertiajs/react';
import Footer from "@/components/footer";
import { IoMdSearch,IoIosArrowDown } from "react-icons/io";
import{ MdOutlineExpandLess} from "react-icons/md"
import { useState } from "react";
import { Link } from "@inertiajs/react";
import {useDebouncedCallback} from 'use-debounce';
import axios from "axios";

interface Props {
    spiceDetails:Spice[];
    initialspices: PaginatedSpice;
    categories:Category[];
    format:{id:number, format:string}[];
}

export default function LandingPage({ initialspices,categories,format }: Props){

    const[isOpen, setIsOpen]=useState(false);
    const[openSort, setIsOpenSort]=useState(false);
    const[loading, setLoading]=useState(false);
    const[searchTerm, setSearchTerm]=useState("");
    const[showInput, setshowInput]=useState(false);
    const[spices, setSpices] = useState<Spice[]>(initialspices.data);
    const[selectedCategory, setSelectedCategory] = useState<string | null>(null);
    const[selectedFormat, setSelectedFormat] = useState<string | null>(null);
    const[spiceDetails, setSpiceDetails] = useState<Spice | null>(null);

    const toggleDropdownSort = () =>setIsOpenSort(!openSort);
    const toggleDropdown = () =>setIsOpen(!isOpen);
    const toggleInput = () => setshowInput(!showInput);

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

    async function fetchSpiceDetails(id:number,format:string){

        if(!id)return
        setLoading(true);

        try{
            const { data } = await axios.get(`/spice/${id}/${format}`,{
                headers:{
                    "Content-Type":"application/json"
                },
                params:{
                    id,
                    format
                }
            });
            
            setSpiceDetails(data)
        }finally{
            setLoading(false)
        }
     }


      function handleSpiceDetails(id: number, format: string) {
          fetchSpiceDetails(id, format) 
      }
    

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
        <div className="w-full text-center bg-blue-300 p-2">
          <p className="">Pay after delivery for areas within Nairobi(some areas of Nairobi😑)</p>
        </div>
        <Navbar/>
        <div className="flex flex-col text-center relative  border-b border-gray-300 p-5 space-y-5 bg-[#7b1113] w-full text-white">
            <h1 className="font-bold text-2xl md:text-4xl tracking-tight">Take a look at our spices</h1>
            <p className=" text-sm font-bold md:text-md">Kenyan-grown. Kenyan-owned. Non-GMO</p>
            <p style={{fontFamily: 'Caveat Brush, cursive'}} className=" text-sm text-pretty md:text-xl md:text-balance">Discover ethically sourced, single-origin spices harvested directly from small-scale farmers across the globe.</p>
        </div>
       
        <div className="flex md:px-7 md:items-center m-5 gap-3">            
            <button onClick={toggleDropdown} className=" flex flex-row rounded-2xl p-2 bg-[#eff2f9] border-2 items-center">Show filter{isOpen ? <IoIosArrowDown className="w-5 h-5"/>: <MdOutlineExpandLess className="h-6 w-6"/>}</button>
            <button onClick={toggleDropdownSort}  className=" flex bg-[#eff2f9] rounded-2xl p-2 border-2">Sort by:</button>
             { showInput && 
              <div className="flex flex-row absolute md:relative  items-center">            
                    <input className=" border-2 rounded-lg w-54 md:w-70 p-2" placeholder="Enter spices" value={searchTerm} onChange={e => {
                    setSearchTerm(e.target.value)
                    handleSearch(e.target.value)           
                    }}/>
          
                <button className="relative right-10 w-6 h-6 transition delay-70 duration-200 ease-in-out hover:bg-gray-200 rounded-full" onClick={() =>{ fetchbyName(searchTerm)} }><IoMdSearch className="h-6 w-6"/></button>
              </div>            
            }
            <button className="relative p-2 transition delay-70 duration-200 ease-in-out  hover:bg-gray-200 rounded-full" onClick={toggleInput} ><IoMdSearch className="h-7 w-7"/></button>                       
        </div>  

          <div className="text-right mr-10">
              {
                  initialspices.links.map(link => (
                link.url ?

                    <Link
                        className={`p-1 mx-1 ${link.active ? 'font-bold text-blue-400 underline' : ''}`}
                        key={link.label} href={link.url} dangerouslySetInnerHTML={{ __html: link.label }} prefetch />
                    :

                    <span
                        className="cursor-not-allowed text-gray-300"
                        key={link.label} dangerouslySetInnerHTML={{ __html: link.label }}>
                    </span>
                ))
              }
            </div> 
          { 
            openSort && (
                <div className="flex flex-col absolute md:left-40  bg-red-300 h-40 p-4">
                    <p>Alphabetically, A-Z</p>
                    <p>Best Selling</p>
                </div>
                  )
                }
        <div className="md:flex">
            {isOpen && (
              <div className="md:flex px-4">
                  <div className="flex md:w-[300px] flex-col p-4 border-r border-gray-400 divide-y divide-white/60 gap-4">
               
                   <div className="flex flex-col border-b border-gray-400 text-gray-600 space-x-2 md:space-y-2">
                      <h2 className="font-bold text-xl ">Category</h2>
                      <div className="grid grid-cols-3 md:grid-cols-1 p-2">
                         {categories.map((category)=>(
                          <div className="flex flex-row items-center gap-2 mb-5">
                            <input type="checkbox" checked={selectedCategory === category.category} onChange={()=>fetchbyCategory(category.category)} id={`category-${category.id}`} className="w-5 h-5"/>
                            <label htmlFor={`category-${category.id}`} className="text-md">{category.category}</label><br/>
                          </div>              
                        ))}
                      </div>
                   </div>

                   <div className="flex flex-col text-gray-600 space-y-4">
                    <h2 className="font-bold text-xl">Format</h2>
                    <div className="grid grid-cols-2 md:grid-cols-1 p-2">
                      {format.map((form)=>(
                      <div className="flex flex-row items-center gap-2 mb-5">
                        <input type="checkbox" id={`format-${form.id}`} onChange={()=>handleFormat(form.format)} checked={selectedFormat === form.format}  name={form.format} className="w-5 h-5"/>
                        <label htmlFor={`format-${form.id}`} className="text-md">{form.format}</label><br/>
                      </div>
                    ))} 
                    </div>                  
                   </div>
                </div>
              </div>
            )}

        <div
            className={`grid flex-1 gap-5 mb-5 grid-cols-1 p-10  ${isOpen ? "md:grid-cols-1 lg:grid-cols-3" : "md:grid-cols-3 lg:grid-cols-4"}`}>

            {!loading && spices.length>0 && spices.map((spice) =>(
              <div  key={spice.product_id}  className=" shadow-xl border border-gray-300 rounded-lg">
                     <Link href={`/spice/${spice.product_id}/${spice.format}`}>
                      <img
                          src={`/storage/${spice.image}`}
                          alt={spice.name}
                          className="w-full object-cover h-64 rounded-lg"
                          onClick={()=>handleSpiceDetails(spice.product_id, spice.format)}
                          loading="lazy"
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

            {!loading && spices.length===0 && initialspices.data.map((spice) => (
                <div  key={spice.product_id}  className=" relative shadow-xl border border-gray-300 rounded-lg">
                    <Link href={`/spice/${spice.product_id}/${spice.format}`}>
                      <img
                          src={`/storage/${spice.image}`}
                          alt={spice.name}
                          className="w-full object-cover h-64 rounded-lg"
                          onClick={()=>handleSpiceDetails(spice.product_id, spice.format)}
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