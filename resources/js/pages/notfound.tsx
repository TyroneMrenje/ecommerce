export default function NotFound({ searchTerm }: { searchTerm: string }) {
    return (
        <div className="text-center py-20">
            <h1 className="text-2xl font-bold">No results for "{searchTerm}"</h1>
            <p className="text-gray-500 mt-2">Try a different name or browse by category</p>
            <a href="/" className="mt-6 inline-block text-blue-500 underline">
                Back to all spices
            </a>
        </div>
    )
}