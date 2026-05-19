import React from "react";
import {Form,Head } from "@inertiajs/react";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";

export default function Register(){
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
                <input type="text" name="name" onChange={()=>validate('name')}/>
                
                <label htmlFor="email">Enter email</label>
                <input type="email" name="email" onChange={()=>validate('email')}/>
                {valid('email') && <p className="text-sm">Valid email address</p>}
                {invalid('email') && <p className="text-sm">{errors.email}</p>}
                
                <label htmlFor="password">Enter password</label>
                <input type="password" name="password"/>

                <button type="submit" disabled={processing}>Register</button>
                </>  
            )}
            </Form>
        </div>
    </div>
   )

}