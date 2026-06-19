import React, { useState } from "react";
import { Link } from "@inertiajs/react";
import { MdOutlineMenu, MdOutlineShoppingCart } from "react-icons/md";
import {  IoMdExit } from "react-icons/io";
import { CgProfile } from "react-icons/cg";


const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  
  const toggleDropdown = () => setIsOpen(!isOpen);

  return (
    <nav className="flex relative fixed top-0 w-full bg-background/70 backdrop-blur z-50 border-b border-gray-300 ">
        <div className="container mx-auto">
            <div className="flex justify-between h-16 items-center">
                 <Link href="/" prefetch className="font-bold text-[#a2252a] text-md px-4">Amimo Spices</Link>
                <div className="hidden md:flex gap-4">
                  <Link href="" prefetch>Contact</Link>
                  <Link href="" prefetch>Yebba</Link>
                </div>              
                <div className="hidden md:flex gap-3">
                     <button >
                        <MdOutlineShoppingCart  className="h-5 w-5"/>
                    </button>
                    
                     <Link href="/user/register" prefetch className="text-md hover:underline hover:text-blue-500">Login/Sign up</Link>
                               
                </div>
                 <button
                        onClick={toggleDropdown}
                        className="md:hidden relative mr-5 mt-2 p-2 rounded-full hover:bg-gray-200"
                        aria-label="Toggle menu"
                      >
                       {isOpen ?<IoMdExit className="h-6 w-6"/> :<MdOutlineMenu className="h-6 w-6" />}
                  </button>

            </div>
          { isOpen && 
             <div className="md:hidden">
                <div className="flex flex-col flex-start space-y-4 w-full h-screen p-4">
                  <Link href="/user/register" prefetch className="text-md hover:underline hover:text-blue-500">Login/Sign up</Link>                               
                  <Link href="" prefetch>Contact</Link>
                  <Link href="" prefetch>Yebba</Link> 
                   <div className="flex flex-row gap-2">
                    <button>
                          <CgProfile  className="h-5 w-5"/>       
                      </button>  
                      <h1>Profile</h1>                    
                  </div>  
                  <div className="flex flex-row gap-2">
                    <button>
                          <MdOutlineShoppingCart  className="h-5 w-5"/>       
                      </button>  
                      <h1>Orders</h1>                    
                  </div>                        
               </div>
             </div>
          }
        </div>    
    </nav>
  );
};

export default Navbar;