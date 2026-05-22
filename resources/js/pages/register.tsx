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
        <div className="">
            <Form method="POST" action="/user/register" 
            resetOnSuccess
            disableWhileProcessing
            className="flex flex-col justify-center items-center h-screen"
            >
            {({
                errors,
                validate,
                valid,
                invalid,
                processing
            })=>(
                <>
                <label htmlFor="name"> Enter name</label>
                <input required type="text" name="name" className="border-2" onChange={()=>validate('name')}/>
                {invalid('name') && <p className="text-sm text-error">{errors.name}</p>}
                
                <label htmlFor="email">Enter email</label>
                <input  required type="email" name="email" onChange={()=>validate('email')}/>
                {invalid('email') && <p className="text-sm text-error">{errors.email}</p>}
                
                <label htmlFor="password">Enter password</label>
                <input  required type={showPassword? 'text': 'password'} name="password" onChange={()=>validate('password')}/>
                <button
                   type="button" 
                   onClick={() => setShowPassword(!showPassword)}
                   className=" right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                 >
                    {showPassword ? <LuEyeClosed/> : <LuEye/>}
                 </button>
                {invalid('password') && <p className="text-red-500">{errors.password}</p>}

                <label htmlFor="password_confirmation">Enter password</label>
                <input required type={showPassword? 'text': 'password'} name="password_confirmation" onChange={()=>validate('password_confirmation')}/>
                <button
                   type="button" 
                   onClick={() => setShowConfirmPassword(!showConfirmPassword)}
                   className=" right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600"
                 >
                    {showConfirmPassword ? <LuEyeClosed/> : <LuEye/>}
                 </button>
        
                {invalid('password_confirmation') && <p className="text-error">{errors.password}</p>}

                <button type="submit" disabled={processing}>Register</button>
                <Link href="/user/login" className="hover:underline hover:text-blue-500" prefetch>
                  <button className="hover-underline">Already have an account,log in</button>
                </Link>
                </>  
            )}
            </Form>
        </div>
    </div>
   )

}