<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SpiceFormatSeeder::class,
            SpiceCategory::class,
            SpiceCategorySeeder::class,                
            SpicePriceSeeder::class,
            SpiceDescriptionSeeder::class,
            SpiceDescriptionInfoSeeder::class,
            SpiceCuisineSeeder::class
        ]);
    }
}
