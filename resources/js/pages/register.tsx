import React from "react";
import {Form,Head, Link } from "@inertiajs/react";
import { useState } from "react";
import { LuEyeClosed, LuEye } from "react-icons/lu";

export default function Register(){
    
    const[showPassword, setShowPassword] =useState(false);
    const[showConfirmPassword, setShowConfirmPassword] =useState(false);

   return(
     <div className="box-border overflow-hidden scroll-smooth">
        <Head title="Register"/>     
        <div className="flex flex-col items-center justify-center h-screen">         
           <div className="relative bottom-20">
             <Link href="/" prefetch>
                <h1 className="font-bold text-[#a2252a] text-3xl">Amimo Spices</h1>  
             </Link>
            </div>    
            <Form method="POST" action="/user/register" 
            resetOnSuccess
            disableWhileProcessing
            className="flex flex-col justify-center items-start space-y-4"
            >
            {({
                errors,
                validate,
                valid,
                invalid,
                processing
            })=>(
                <>
                <div>
                  <p className="text-2xl font-bold">Sign up</p>
                  <h1 className="text-sm text-gray-500 font-normal">Sign up or create an account</h1>              
                </div>
                <input required type="text" name="name" placeholder="Enter name" className="border border-gray-400 p-3 w-80 rounded-lg" onChange={()=>validate('name')}/>
                {invalid('name') && <p className="text-sm text-error">{errors.name}</p>}
                
                <input  required type="email" name="email" placeholder="Enter email" onChange={()=>validate('email')} className="border border-gray-400 p-3 w-80 rounded-lg"/>
                {invalid('email') && <p className="text-sm text-error">{errors.email}</p>}
                
               <div className="flex flex-row items-center">
                 <input  required type={showPassword? 'text': 'password'} name="password" placeholder="Enter password" onChange={()=>validate('password')} className="border border-gray-400 p-3 w-80 rounded-lg"/>
                 <button
                   type="button" 
                   onClick={() => setShowPassword(!showPassword)}
                   className="relative right-10 text-gray-400 hover:text-gray-600"
                  >
                    {showPassword ? <LuEyeClosed/> : <LuEye/>}
                 </button>
                {invalid('password') && <p className="text-red-500">{errors.password}</p>}
               </div>

               <div className="flex flex-row items-center">
                 <input required type={showConfirmPassword? 'text': 'password'} name="password_confirmation" placeholder="Confirm Password" onChange={()=>validate('password_confirmation')} className="border border-gray-400 p-3 w-80 rounded-lg"/>
                 <button
                   type="button" 
                   onClick={() => setShowConfirmPassword(!showConfirmPassword)}
                   className=" relative right-10 text-gray-400 hover:text-gray-600"
                 >
                    {showConfirmPassword ? <LuEyeClosed/> : <LuEye/>}
                 </button>
        
                {invalid('password_confirmation') && <p className="text-error">{errors.password}</p>}

               </div>
               <div className="flex flex-col w-full items-center space-y-2">
                <button type="submit" disabled={processing} className="bg-[#a2252a] rounded-lg p-2 w-60 text-white transition delay-80 duration-200 ease-in-out  hover:scale-110 ">Register</button>
                <Link href="/user/login" className="hover:underline hover:text-blue-500" prefetch>
                  <button className="hover-underline">Already have an account,log in</button>
                </Link>
               </div>
                </>  
            )}
            </Form>
        </div>
    </div>
   )

}