import React from "react";
function Footer() {
  const year = new Date().getFullYear();

  return (
  <footer className=" flex relative fixed bottom-0 w-full text-[#f0f7ff] border-t border-gray-700 bg-[#7b1113]">
    <div className="container mx-auto p-4">
      <div className="grid grid-cols-1 md:grid-cols-3 h-40 justify-items-center">
        <div>
          <h2 className="text-lg font-bold">Amimo Spices</h2>
        </div>
         <div>
           <h2>Contact</h2>
         </div>
          <div>
            <h2>Follow Us</h2>
          </div>
      </div>
    </div>
</footer>
)}
export default Footer;
   


