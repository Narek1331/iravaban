<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Language,
    Page,
};
use App\Services\FileService;

class PageSeeder extends Seeder
{
    /**
     * The FileService instance.
     *
     * @var \App\Services\FileService
     */
    protected $fileService;

    /**
     * Create a new seeder instance.
     *
     * @param \App\Services\FileService $fileService
     */
    public function __construct(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = Language::all();

        $pages = [
            [
                'type' => 'about',
                'img_path' => 'https://cdn.wallpapersafari.com/82/48/4JXLf6.jpg',
                'data' =>[
                    'am' => [
                       'title' => 'Մեր Ընկերության Մասին',
                       'description' => 'Մենք առաջարկում ենք իրավաբանական ծառայություններ բոլոր ոլորտներում՝ աջակցելով մեր հաճախորդներին լավագույն արդյունքների հասնելու համար:',
                    ],
                    'ru' => [
                       'title' => 'О нашей компании',
                       'description' => 'Мы предоставляем юридические услуги во всех областях, поддерживая наших клиентов в достижении наилучших результатов.',
                    ],
                    'en' => [
                       'title' => 'About Our Firm',
                       'description' => 'We offer legal services across all sectors, helping our clients achieve the best outcomes.',
                    ],
                ]
            ],
            [
                'type' => 'our-vision',
                'img_path' => 'https://wallpapercave.com/wp/wp2750384.jpg',
                'data' => [
                    'am' => [
                       'title' => 'Մեր տեսլականը',
                       'description' => 'Մենք ձգտում ենք պաշտպանել մեր հաճախորդների իրավունքներն ու հետաքրքրությունները՝ ապահովելով արդարություն և իրավական պաշտպանություն:',
                    ],
                    'ru' => [
                       'title' => 'Наше видение',
                       'description' => 'Мы стремимся защищать права и интересы наших клиентов, обеспечивая справедливость и юридическую защиту.',
                    ],
                    'en' => [
                       'title' => 'Our Vision',
                       'description' => 'We strive to protect our clients’ rights and interests, ensuring justice and legal protection.',
                    ],
                ]
            ],
            // [
            //     'type' => 'footer',
            //     'data' => [
            //         'am' => [
            //            'title' => 'Կապ և իրավական ծառայություններ',
            //            'description' => 'Մեր գրասենյակը տրամադրում է արագ և վստահելի ծառայություններ',
            //         ],
            //         'ru' => [
            //            'title' => 'Контакты и юридические услуги',
            //            'description' => 'Наш офис предоставляет быстрые и надежные услуги.',
            //         ],
            //         'en' => [
            //            'title' => 'Contact & Legal Services',
            //            'description' => 'Our office provides fast and reliable services.',
            //         ],
            //     ]
            // ],
        ];

        foreach($pages as $page)
        {
            $imgPath = null;

            if(isset($page['img_path']))
            {
                $imgPath = $this->fileService->uploadFileByUrl($page['img_path']);
            }

            $createdPage = Page::create([
                'type' => $page['type'],
                'img_path' => $imgPath
            ]);

            if(isset($page['data']))
            {
                foreach($page['data'] as $index => $languageData)
                {
                    $createdPage->languages()->attach([[
                        'language_id' => $languages->where('slug', $index)->first()->id,
                        'title' => $languageData['title'],
                        'description' => $languageData['description'],
                    ]]);
                }
            }
        }
    }
}
