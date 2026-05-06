import React, { useState } from "react";
import { Link } from "@inertiajs/react";
import { MdOutlineMenu } from "react-icons/md";
import { IoMdSearch } from "react-icons/io";
import { MdOutlineShoppingCart } from "react-icons/md";
import { CgProfile } from "react-icons/cg";


const Navbar = () => {
  const [isOpen, setIsOpen] = useState(false);
  
  const toggleDropdown = () => setIsOpen(!isOpen);

  return (
    <nav className="fixed top-0 w-full bg-background/70 backdrop-blur z-50 border-b border-gray-300">
        <div className="container mx-auto">
            <div className="flex justify-between h-16">
                <div className="flex gap-4 items-center">
                    <Link href="/spices" prefetch className="font-bold text-[#a2252a] text-lg mr-4">Amimo Spices</Link>
                    <Link href="" prefetch className="text-md">About</Link>
                    <Link href="text-md" prefetch>Contact</Link>
                    <Link href="text-md" prefetch>Yebba</Link>
                </div>
                <div className="flex gap-4">
                    <button>
                        <IoMdSearch  className="h-5 w-5"/>
                    </button>
                     <button>
                        <MdOutlineShoppingCart  className="h-5 w-5"/>
                    </button>
                     <button>
                        <CgProfile  className="h-5 w-5"/>
                    </button>
                    <button
                        onClick={toggleDropdown}
                        className="md:hidden relative mr-5 mt-2 rounded-md text-white"
                        aria-label="Toggle menu"
                      >
                       <MdOutlineMenu className="h-7 w-7" />
                     </button>
                </div>
            </div>
        </div>    
    </nav>
  );
};

export default Navbar;