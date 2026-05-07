import React from "react";
import { Link } from "react-router-dom";
import { FaLinkedin,FaGithub } from "react-icons/fa";
import { SiGmail } from "react-icons/si";

function Footer() {
  const year = new Date().getFullYear();

  return (
  <footer className="relative mt-10 bottom-0 w-full text-[#f0f7ff] border-t border-gray-700">
  <div className="container px-4 py-10">
    <div className="flex flex-col md:flex-row justify-between gap-8">
      <div className="flex-1">
        <span className="text-xl font-semibold block mb-2">Connect</span>
        <div className="flex gap-4">
          <a href="https://github.com/TyroneMrenje" aria-label="Github">
            <FaGithub
              className="w-7 h-7 transition duration-300 hover:-translate-y-1 hover:scale-110 "
            />
          </a>
          <a href="https://www.linkedin.com/in/tyrone-mrenje/" aria-label="Linkedin">
            <FaLinkedin
              className="w-7 h-7  transition duration-300 hover:-translate-y-1 hover:scale-110"
            />
          </a>
          <a href="https://mail.google.com/mail/?view=cm&fs=1&to=tyronemrenje@gmail.com" aria-label="Gmail">
            <SiGmail
              className="w-7 h-7 transition duration-300 hover:-translate-y-1 hover:scale-110"
            />
          </a>
        </div>
      </div>
      
      <div className="flex-1 md:ml-10">
        <span className="text-xl font-semibold block mb-2">Links</span>
        <div className="flex flex-col gap-2">
           <Link 
            to="" 
            className="text-lg transition duration-300 hover:text-orange-300"
          >
            Home
          </Link>
          
          <Link 
            to=""
            className="text-lg transition duration-300 hover:text-orange-300"
          >
            About
          </Link>
          <Link 
            to="" 
            className="text-lg transition duration-300 hover:text-orange-300"
          >
            Contact
          </Link>        
        </div>
      </div>

      <div className="flex-1 max-w-md">
        <span className="text-xl font-semibold block mb-2">Portfolio</span>
        <p className="text-lg">
          &copy; {year} Tyrone Mrenje. All rights reserved.
        </p>
      </div>      
    </div>
  </div>
</footer>
)}
export default Footer;
   


