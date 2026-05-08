<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spice;

class SpiceCuisineSeeder extends Seeder
{ 
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spiceCuisine=[
            "Cocoa"=>'Baking, desserts, beverages, savory spicy foods, seasoning blends.',
            "Cream of Tartar"=>'Baking, fish, meat.',
            "Fennel Seeds"=>'Sausages, sauces, stews, meat and chicken dishes, baking, chai.',
            "Cumin"=>'Curries, seasoning blends, couscous, rice and bean dishes, stews, soups, meat, vegetables.',
            "Dill Weed"=>'Dairy-based sauces, with mild white meats, in bread, over cheese.',
            "Fish Sauce"=>'Marinades, dipping sauces, stir-fries, soups, stews.',
            "Dehydrated Garlic"=>'Bread (think garlic bread), cheese-based dishes, chili, popcorn, root vegetables, soups, spice blends, stews.',
            "Crystallized Ginger"=>'Beef, pork, or salmon dishes, relish, rice, chutney, desserts.',
            "Ginger Powder"=>'Marinades, stir-fries, dry rubs, desserts.',
            "Herbs de Provence"=>'Grilled or roasted meat or fish, mushrooms, sauces, soups, stews.',
            "Lemon Extract"=>'Baking, marinades, sauces, beverages.',
            "Lemon Pepper"=>'White fish, seafood, tofu, chicken, vegetables, potatoes, pasta.',
            "Mustard Seed"=>'Sauces, homemade mustard and ketchup, pickles, slaw, DIY curry blends.',
            "Nutmeg"=>'Pies, beverages, DIY spice rubs, soups, stews, baked goods, pasta, pork, spinach, cream sauces, biscuits.',
            "Marjoram"=>'Fish, lamb, pork, soups, tomato-based stews and sauces, sausage, fruit-based desserts.',
            "Almond-extract"=>'Baking, desserts, fruit blends, creams.',
            "Anise"=>'Meats, soups, stews, braises, desserts.',
            "Basil"=>'Fish, chicken, tomatoes, fruits, dressings, marinades, pasta, cheese.',
            "Bay leaves"=>'Stews, sauces, soups, marinades, dressings, rice dishes, steeping and mulling, pickles.',
            "Cardamom"=>'Baking, desserts, spice rubs, curries, soups, stews, marinades, meats, vegetables.',
            "Allspice"=>'Sauces, pickling, DIY seasoning blends, desserts.',
            "Apple Pie Spice"=>'Baking, meats, sauces, stews, vegetables, fruits, desserts.',
            "Bbq Seasoning"=>'BBQ, grilling, roasting, chicken, eggs, vegetables, pork, tofu, rice, noodles.',
            "Celery Seeds"=>'Sausages, bread, stuffings, stews, soups, marinades, dressings.',
            "Chili Seeds"=>'garnish meat, vegetables, pasta, desserts.',
            "Cilantro"=>'Beans, curries, sauces, salsas, soups, stews, rice.',
            "Cinnamon"=>'Infusions for tea, coffee, beer, liquor, mulling spices, pickling blends.',
            "Cloves"=>'Pork, beef, vegetables, fruits, sauces, baking.'
        ];

        foreach($spiceCuisine as $spice=>$recommendation){
            Spice::where('name',$spice)->update([
                'recommendation'=>$recommendation
            ]);
        }
    }
}
