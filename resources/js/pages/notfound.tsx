import Navbar from "@/components/navbar"
import Footer from "@/components/footer";
import { Head } from "@inertiajs/react"
import { FaArrowLeft } from "react-icons/fa6";


export default function NotFound({ searchTerm }: { searchTerm: string }) {
    return (
        <div className="box-border overflow-hidden scroll-smooth ">
            <Head title="Spice Not Found"/>
            <Navbar/>           
             <div className="flex relative flex-col items-center justify-center w-full mt-10 h-70 mb-20  text-center space-y-2">  
                    <h1 style={{fontFamily:'JetBrains Mono Variable, monospace'}} className="text-3xl font-bold">No results for "{searchTerm}"</h1>
                    <p className="text-gray-500 mt-2 text-md">Go back to home. We're sure we have something for you😁.</p>
                    <a href="/" className="mt-6 inline-block text-blue-500 hover:underline">
                    <div className="flex flex-row items-center gap-2">
                        <FaArrowLeft/>Back to all spices
                    </div>
                    </a>
            </div>
            <Footer/>
        </div>
    )
}