import { Head } from "@inertiajs/react";
import { Spice } from "@/types/spice";
import Navbar from "@/components/navbar"; 
import Footer from "@/components/footer";
import { IoMdSearch } from "react-icons/io";
import { useState } from "react";
 
interface Props {
    spices: Spice[];
}

export default function LandingPage({ spices }: Props){

    const[isOpen, setIsOpen]=useState(false);
    const[openSort, setIsOpenSort]=useState(false);

    const toggleDropdownSort = () =>setIsOpenSort(!openSort);
    const toggleDropdown = () =>setIsOpen(!isOpen);

    return(
       <div className="box-border overflow-hidden scroll-smooth -z-10">
        <Head title="The best spice plug"/>
        <Navbar/>
        <div className="flex flex-col relative h-30 p-5 md:mt-20 border-b border-gray-600">
            <h1 className="font-medium text-4xl tracking-tight">Take a look at our spices</h1>
            <p className="text-lg text-balance text-[#7f2629]">Discover ethically sourced, single-origin spices harvested directly from small-scale farmers across the globe.</p>
        </div>
        <div className="flex m-5 gap-4">
            <button onClick={toggleDropdown} className="rounded-2xl p-2 bg-[#eff2f9] border-2">Show filter</button>
            <button onClick={toggleDropdownSort}  className="bg-[#eff2f9] rounded-2xl p-2 border-2">Sort by:</button>
            <input className="border-2 rounded-lg w-70 p-3" placeholder="Enter spices"/>
            <button className="relative right-15"><IoMdSearch className="h-6 w-6"/></button>
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
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category1" name="category" value="Sweet" className="w-5 h-5"/>
                        <label htmlFor="category1" className="text-lg">Sweet</label><br/>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                         <input type="checkbox" id="category2" name="category" value="Pungent" className="w-5 h-5"/>
                         <label htmlFor="category2">Pungent</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                         <input type="checkbox" id="category3" name="category" value="Sour" className="w-5 h-5"/>
                         <label htmlFor="category3">Sour</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category4" name="category" value="Herby" className="w-5 h-5"/>
                        <label htmlFor="category4">Herby</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category5" name="category" value="Bitter" className="w-5 h-5"/>
                        <label htmlFor="category5">Bitter</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category6" name="category" value="Woody" className="w-5 h-5"/>
                        <label htmlFor="category6">Woody</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category7" name="category" value="Cooling" className="w-5 h-5"/>
                        <label htmlFor="category7">Cooling</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category8" name="category" value="Spicy" className="w-5 h-5"/>
                        <label htmlFor="category8">Spicy</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category9" name="category" value="Nutty" className="w-5 h-5"/>
                        <label htmlFor="category9">Nutty</label>
                      </div>
                      <div className="flex flex-row items-center gap-2 mb-5">
                        <input type="checkbox" id="category10" name="category" value="Earthy" className="w-5 h-5"/>
                        <label htmlFor="category10">Earthy</label>
                      </div>
                   </div>

                   <div className="flex flex-row md:flex-col border-b border-gray-400 text-gray-600 space-y-4">
                    <h2 className="font-bold text-xl">Format</h2>
                    <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="format1" name="format" value="Whole" className="w-5 h-5"/>
                        <label htmlFor="category10">Whole</label>
                    </div>
                    <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="format2" name="format" value="Ground" className="w-5 h-5"/>
                        <label htmlFor="format2">Ground</label>
                    </div>
                    <div className="flex flex-row items-center gap-2 ">
                        <input type="checkbox" id="format3" name="format" value="Blend" className="w-5 h-5"/>
                        <label htmlFor="format3">Blend</label>
                    </div>
                    <div className="flex flex-row items-center gap-2 ">
                        <input type="checkbox" id="format4" name="format" value="Powdered" className="w-5 h-5"/>
                        <label htmlFor="format4">Powdered</label>
                    </div>
                    <div className="flex flex-row items-center gap-2 ">
                        <input type="checkbox" id="format5" name="format" value="Herbaceous" className="w-5 h-5"/>
                        <label htmlFor="format5">Herbaceous</label>
                    </div>
                    <div className="flex flex-row items-center gap-2 mb-5">
                        <input type="checkbox" id="format6" name="format" value="Liquid" className="w-5 h-5"/>
                        <label htmlFor="format6">Liquid</label>
                    </div>
                   </div>

                   <div className="flex flex-row md:flex-col text-gray-600 space-y-2">
                      <h2 className="font-bold text-xl">Cuisine</h2>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="cuisine1" name="cuisine" value="African" className="w-5 h-5"/>
                        <label htmlFor="cuisine1" className="text-lg">African</label><br/>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                         <input type="checkbox" id="cuisine2" name="cuisine" value="Japanese" className="w-5 h-5"/>
                         <label htmlFor="cuisine2">Japanese</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                         <input type="checkbox" id="cuisine3" name="cuisine" value="Chinese" className="w-5 h-5"/>
                         <label htmlFor="cuisine3">Chinese</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="category4" name="cuisine" value="Indian" className="w-5 h-5"/>
                        <label htmlFor="cuisine4">Indian</label>
                      </div>
                      <div className="flex flex-row items-center gap-2">
                        <input type="checkbox" id="cuisine5" name="cuisine" value="Mediterranean" className="w-5 h-5"/>
                        <label htmlFor="cuisine5">Mediterranean</label>
                      </div>
                   </div>
                </div>
              </div>
            )}
        <div
            className={`grid flex-1 gap-5 m-3 grid-cols-1 md:grid-cols-3 lg:${isOpen ? "grid-cols-3" : "grid-cols-4"}`}>
            {spices.map((spice) => (
                <div  key={spice.product_id}  className="shadow-xl border border-gray-300 rounded-lg">
                    <img
                        src={`/storage/${spice.image}`}
                        alt={spice.name}
                        className="w-full object-cover h-64 rounded-lg"
                    />
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
 </div>
         
    )
}