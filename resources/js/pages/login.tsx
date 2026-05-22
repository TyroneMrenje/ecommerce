import React from "react";
import {Form,Head } from "@inertiajs/react";
import Navbar from "@/components/navbar";
import Footer from "@/components/footer";
import { useState } from "react";
import { LuEyeClosed, LuEye } from "react-icons/lu";

export default function Login(){

    return(
        <div>
            <Head title="Login"/>
            <Navbar/>
            <Form method="POST" action='/users/login'
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
                 <label htmlFor="email">Enter email</label>
                 <input required type="email" name="email" onChange={()=>validate('email')}/>
                {valid('email') && <p className="text-sm text-green-500">valid</p>}
                {invalid('email') && <p className="text-sm text-red-500">{errors.email}</p>}
                <label htmlFor="password">Enter password</label>
                <input required type="password" name="password" onChange={()=>validate('password')}/>
                {invalid('password') && <p className="text-sm text-red-500">{errors.password}</p>}
                <button type="submit" disabled={processing}>Login</button>

               </>

           )}
            </Form>
        </div>
    )
}