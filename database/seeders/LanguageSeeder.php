<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = [
            [
                'name' => 'am',
                'slug' => 'am',
                'flag' => '🇦🇲',
            ],
            [
                'name' => 'ru',
                'slug' => 'ru',
                'flag' => '🇷🇺'

            ],
            [
                'name' => 'en',
                'slug' => 'en',
                'flag' => '🇺🇸'
            ],
        ];

        foreach($languages as $language)
        {
            Language::create($language);
        }

    }
}
