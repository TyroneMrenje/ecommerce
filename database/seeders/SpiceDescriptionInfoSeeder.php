<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Spice;

class SpiceDescriptionInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $spiceInfo=[
            "Cocoa"=>'Cocoa Powder is made from the seeds of the cacao tree, which are fermented, dried, roasted, and then ground into a fine powder. It is commonly used in baking and cooking to add a rich chocolate flavor to desserts, beverages, and savory dishes. Cocoa Powder is known for its deep, intense chocolate taste with bitter undertones and a slightly earthy aroma.',

            "Cream of Tartar"=>'Cream of Tartar, also known as potassium bitartrate, is a byproduct of the winemaking process. It is a fine, white powder that is commonly used in baking and cooking to stabilize egg whites, prevent sugar crystallization, and add acidity to recipes. Cream of Tartar has a slightly sour taste and is often used in recipes for meringues, soufflés, and certain types of cakes.',

            "Fennel Seeds"=>'Fennel seed has a warm, sweet licorice aroma and flavor with lemony top notes and a camphoraceous undertone.',

            "Cumin"=>'Cumin Seed, is a warm, earthy spice that is often associated with the strongly seasoned cuisines of India, Mexico, Asia, and Indonesia. Cumin Seed is one of the most consumed spices around the globe. It is a member of the parsley family and is closely related to Caraway and Fennel Seeds. Cumin Seed is spicy-sweet, aromatic and earthy, with a hint of citrus and bitter undertones.',

            "Dill Weed"=>'Dill Weed, or dilly weed, is comprised of the feathery green leaves of the dill plant. Dill Weed has a light and airy essence, while the seed is peppery, with a bitter edge. Dill Weed is breezy and grassy, with top notes of lemon and a bit of caraway and licorice for depth.',

            "Fish Sauce"=>'Fish sauce is a pungent, salty condiment made from fermented fish. It is commonly used in Southeast Asian cuisine to add depth of flavor and umami to dishes. The sauce is typically made by fermenting fish, such as anchovies, with salt for several months, resulting in a rich and savory liquid that can be used in marinades, dressings, and sauces.',

            "Dehydrated Garlic"=>'Dehydrated garlic is a convenient, long-lasting alternative to fresh garlic made by drying sliced or minced cloves at low temperatures. It retains much of the flavor and aroma of fresh garlic, making it a popular choice for seasoning dishes, soups, and sauces. Dehydrated garlic can be rehydrated with water or used as is for a more concentrated flavor.',

            "Crystallized Ginger"=>'Crystallized Ginger is made from real ginger root, sliced and left to macerate in cane sugar. Maceration allows the woody fibers in the ginger to soften and the liquids locked in the fibers to release, creating a chewy, vibrant ginger that’s both sweet and spicy.Crystallized Ginger tastes sharp, peppery, and warm with sweet lemon undertones.',

            "Ginger Powder"=>'Ginger Powder is the product of the dried, ground ginger rhizome. It is off-white or slightly brownish and has a strong aroma and a sweet, pungent flavor. Ginger is an essential spice used in Chinese, Korean, Japanese, Vietnamese, and multiple South Asian cuisines. Ginger is a flowering, herbaceous perennial used as a spice. It is a rhizome, and is closely related to Galangal, Turmeric, and Cardamom.Ginger Powder is peppery and warm with lemon undertones.',

            "Herbs de Provence"=>'Herbs de Provence is an aromatic blend of herbs that are commonly grown in Provence, an administrative region of southeastern France. It is also referred to as herbes de Provence, herb de Provence seasoning, or Provencal herbs.Herbs de Provence is sweet and gentle herb blend, with notes of pine, mint, and lemon. It delivers peppery depth and floral top notes.',
            
            "Lemon Extract"=>'Lemon extract is a highly concentrated flavoring made by soaking lemon peels in alcohol, usually vodka. Lemon extract tastes just like, well ,lemons -tart, bitter, and zesty.',

            "Lemon Pepper"=>'Lemon Pepper is a salt-free, MSG-free way to add flavor to your cooking without adding sodium. Citrusy lemon is a natural flavor enhancer, brightening flavors in much the same way that salt does. Lemon Pepper is also called lemon pepper bulk. It is popular with seasoning companies; olive oil shops; Mediterranean, American, and chicken restaurants; coffee, tea, dip mix, and sauce manufacturers; independent spice shops; and breweries.Lemon Pepper tastes peppery and herbal with bright notes of lemon.',

            "Mustard Seed"=>'Yellow mustard seeds are popular and widely used. They are indigenous to western Asia and southern Europe, and are slightly larger than the other types of mustard. As is standard in mustard varietals, they do not have much aroma or flavor until they are ground or roasted. Once they are ground, mustard seeds are pungent, sharp, and earthy.',

            "Nutmeg"=>'Whole Nutmeg, is also referred to as nutmeg whole, bulk whole nutmeg or Indonesian whole nutmeg. It is the seed of an Indonesian evergreen tree. Whole Nutmeg has a rich fragrance; its smell is piney with a bit of camphor and pepper, but it’s also surprisingly weighty and almost smells buttery.Whole Nutmeg is nutty, woody, warm and spicy, and bittersweet with notes of pepper and clove.',

            "Marjoram"=>'Marjoram is a sweet, aromatic herb that belongs to the mint family. It has a delicate flavor with hints of citrus and pine, making it a popular choice for seasoning a variety of dishes, including soups, stews, and roasted meats. Marjoram is often used in Mediterranean and Middle Eastern cuisines to add depth and complexity to recipes.',

            "Almond-extract"=>'Almond extract is a highly concentrated flavoring agent derived from bitter almond oil, water, and alcohol, commonly used to add a sweet, nutty aroma to baked goods, pastries, and dairy products. It is prized for its strong flavor, which is a staple in recipes like marzipan, macaroons, and cookies.',

            "Anise"=>'Anise is native to the Mediterranean. It is a member of the parsley family and is closely related to fennel, asafoetida, caraway, chervil, coriander, cilantro, dill, and cumin. The seed physically resembles caraway, cumin, and fennel seed, so make sure to check which seed you want before buying.Anise Seed is licorice-y with notes of pepper and lemon',
            
            "Basil"=>'Organic Basil is a member of the Lamiaceae, or mint, family. It is closely related to Organic Marjoram, Organic Mediterranean Oregano, Organic Rubbed Sage, Organic Thyme Leaf, and Organic Cracked Rosemary. Organic Basil is popular with independent spice shops; seasoning companies; Italian, taco, and Mexican restaurants; brewpubs; food trucks; manufactures of jams and sauces; catering companies; and olive oil shops.Basil is aromatic and savory and has notes of pepper, anise, and mint.',

            "Bay leaves"=>'Bay Leaves, Laurus nobilis, are the aromatic, flavorful leaves taken from the bay laurel tree. They are also called bay leaf, bay leaves, whole bay leaf, or bay leaves whole, and colloquially as true laurel, sweet bay, or bay herb. Bay leaves are rarely used fresh. Dried bay leaves have a more pleasant, sweeter taste than fresh. These leaves will continue to flavor a dish as long as they are in it; to moderate their flavor. Bay Leaves are peppery, bitter, grassy, and pungent with a menthol undertone.',

            "Cardamom"=>'Cardamom Seeds, are the small brown and black seeds found inside the green cardamom pods. Cardamom Seeds work well in combination with caraway, chili powder, cinnamon, coriander, cumin, ginger, paprika, cilantro, garlic, orange, lemon, maple, and pepper. Cardamom Seeds are complex, peppery, and floral, with elements of eucalyptus, mint, and citrus.',

            "Allspice"=>'Allspice’s name and multi-faceted flavor means it is often mistakenly thought of as a blend, but it is in fact one spice that comes from one berry. It is the only spice that is grown exclusively in the Western Hemisphere and is native to the Caribbean, Mexico, Central America, and South America. Organic Allspice Berries are peppery and astringent, with notes of cinnamon, citrus, and clove.',

            "Apple Pie Spice"=>'Apple Pie Spice, also referred to as apple pie spices or apple pie seasoning, is a salt-free blend that is appealingly sweet and aromatic. Warm, woodsy, and sweet, with notes of citrus and fruit. Apple Pie Spice is regularly purchased by seasoning companies; meal mix, subscription, and apple butter, cider, and jam manufacturers; steak houses, brewpubs, and food trucks; independent spice shops; olive oil shops; and breweries.',

            "Bbq Seasoning"=>'BBQ Seasoning is a blend of spices and herbs that is used to add flavor to grilled or smoked meats. It typically includes ingredients such as paprika, garlic powder, onion powder, black pepper, cayenne pepper, and brown sugar. BBQ Seasoning can be used as a dry rub or mixed with oil to create a marinade for meats like ribs, chicken, or brisket. The combination of spices in BBQ Seasoning gives it a smoky, savory, and slightly sweet flavor that enhances the taste of grilled dishes.',

            "Celery Seeds"=>'Celery seeds are small and with alternating light and dark stripes, and are technically fruits. Celery Seed goes well with onion, nutmeg, parsley, bell peppers, carrots, turmeric, chicken, sage, cumin, soy sauce, ginger, and vinegar. Celery Seeds have a hay-like, grassy, slightly bitter taste and aroma.',

            "Chili Seeds"=>'Chili Seeds are the seeds of chili peppers, which are used to add heat and flavor to dishes. They can be ground into a powder or used whole in recipes. Chili Seeds have a spicy, pungent flavor that can range from mild to extremely hot, depending on the variety of chili pepper they come from. They are commonly used in cuisines around the world to enhance the taste of soups, stews, sauces, and marinades.',

            "Cilantro"=>'Cilantro is derived from the leaves of the coriander plant, an annual that reaches a height of 12-36 inches. It is one of the few plants that produces both an herb and a spice. Cilantro, the herb, is harvested from the leaves and coriander, the spice, comes from the seeds. Cilantro has a refreshing, anise-like, piney flavor with hints of lemon, mint and pepper.',

            "Cinnamon"=>'Cinnamon is a spice obtained from the inner bark of several tree species from the genus Cinnamomum. Cinnamon is used mainly as an aromatic condiment and flavouring additive in a wide variety of cuisines, in particular sweet and savoury dishes such as biscuits, breakfast cereals, snack foods, bagels, teas or hot chocolate. Cinnamon is woodsy, spicy and sweet.',
            
            "Cloves"=>'Cloves are the aromatic flower buds of a tree in the family Myrtaceae. It is a close relative of other plants with prominent aromas and flavors, like guava, eucalyptus, and Allspice. Cloves are bold, woodsy, slightly medicinal, sweet, and rich, with undertones of camphor and pepper.'
        ];

        foreach($spiceInfo as $spice=>$description){
            Spice::where('name',$spice)->update([
                'description'=>$description
            ]);
        }
    }
}
