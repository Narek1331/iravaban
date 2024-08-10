<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\{
    LanguageSeeder,
    PageSeeder,
    UserSeeder,
    BannerImageSeeder,
};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            LanguageSeeder::class,
            PageSeeder::class,
            ServiceSeeder::class,
            UserSeeder::class,
            BannerImageSeeder::class,
        ]);
    }
}
