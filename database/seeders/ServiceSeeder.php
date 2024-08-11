<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Language,
    Service,
};
use App\Services\FileService;

class ServiceSeeder extends Seeder
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

        $services = [
            [
                'type' => 'legal',
                'img_path' => 'https://wallpapers.com/images/hd/lawyer-symbol-igym84n6b8nq04ob.jpg',
                'data' => [
                    'am' => [
                        'title' => 'Հասարակական իրավունք',
                        'description' => 'Մենք տրամադրում ենք մասնագիտական խորհրդատվություն և պաշտպանություն հասարակական իրավունքով, ներառյալ վարչական իրավախախտումների պաշտպանություն և նորմատիվ իրավական ակտերի վերլուծություն:',
                    ],
                    'ru' => [
                        'title' => 'Административное право',
                        'description' => 'Мы предоставляем профессиональные консультации и защиту по административному праву, включая защиту от административных правонарушений и анализ нормативных актов.',
                    ],
                    'en' => [
                        'title' => 'Administrative Law',
                        'description' => 'We offer professional advice and representation in administrative law, including defense against administrative offenses and analysis of regulatory acts.',
                    ],
                ],
            ],
            [
                'type' => 'legal',
                'img_path' => 'https://w0.peakpx.com/wallpaper/921/717/HD-wallpaper-law-law-and-order-lawyer.jpg',
                'data' => [
                    'am' => [
                        'title' => 'Կորպորատիվ իրավունք',
                        'description' => 'Մեր թիմը մասնագիտական աջակցություն է տրամադրում կորպորատիվ իրավունքով, ներառյալ ընկերությունների ձևավորում, պայմանագրերի պատրաստում և գործարար վեճերի լուծում:',
                    ],
                    'ru' => [
                        'title' => 'Корпоративное право',
                        'description' => 'Наша команда предоставляет профессиональную помощь в области корпоративного права, включая создание компаний, составление контрактов и разрешение коммерческих споров.',
                    ],
                    'en' => [
                        'title' => 'Corporate Law',
                        'description' => 'Our team provides expert assistance in corporate law, including company formation, contract drafting, and resolution of business disputes.',
                    ],
                ],
            ],
            [
                'type' => 'legal',
                'img_path' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSayiCwcdcRylzJoq7cipp7WCwqXa_FST3Lzw&s',
                'data' => [
                    'am' => [
                        'title' => 'Պայմանագրային իրավունք',
                        'description' => 'Մենք տրամադրում ենք իրավաբանական աջակցություն պայմանագրերի բանակցության, նախապատրաստման և վերլուծության համար, ինչպես նաև պայմանագրային վեճերի լուծման համար:',
                    ],
                    'ru' => [
                        'title' => 'Договорное право',
                        'description' => 'Мы предоставляем юридическую помощь в переговорах, составлении и анализе контрактов, а также в разрешении договорных споров.',
                    ],
                    'en' => [
                        'title' => 'Contract Law',
                        'description' => 'We offer legal assistance with negotiating, drafting, and reviewing contracts, as well as resolving contract disputes.',
                    ],
                ],
            ],
            [
                'type' => 'legal',
                'img_path' => 'https://cdn.wallpapersafari.com/33/15/G9sieC.jpg',
                'data' => [
                    'am' => [
                        'title' => 'Ընտանեկան իրավունք',
                        'description' => 'Մեր իրավաբանները տրամադրում են աջակցություն ընտանեկան իրավունքի հարցերով, ներառյալ ամուսնալուծություններ, երեխայի Custody և հարստության բաժանում:',
                    ],
                    'ru' => [
                        'title' => 'Семейное право',
                        'description' => 'Наши юристы предоставляют помощь по вопросам семейного права, включая разводы, опеку над детьми и раздел имущества.',
                    ],
                    'en' => [
                        'title' => 'Family Law',
                        'description' => 'Our attorneys provide assistance with family law matters, including divorces, child custody, and asset division.',
                    ],
                ],
            ],
            [
                'type' => 'legal',
                'img_path' => 'https://blog.lifebacklaw.com/hubfs/shutterstock_2121960653.jpg',
                'data' => [
                    'am' => [
                        'title' => 'Քրեական իրավունք',
                        'description' => 'Մենք տրամադրում ենք պաշտպանություն քրեական գործերով, ներառյալ դատական քննություն, մեղադրանքների դեմ պաշտպանություն և պատիժների վերանայում:',
                    ],
                    'ru' => [
                        'title' => 'Уголовное право',
                        'description' => 'Мы предоставляем защиту по уголовным делам, включая судебное разбирательство, защиту от обвинений и пересмотр приговоров.',
                    ],
                    'en' => [
                        'title' => 'Criminal Law',
                        'description' => 'We offer defense in criminal cases, including court proceedings, defense against charges, and appeals of sentences.',
                    ],
                ],
            ]
        ];

        foreach($services as $service)
        {
            $imgPath = null;

            if(isset($service['img_path']))
            {
                $imgPath = $this->fileService->uploadFileByUrl($service['img_path']);
            }

            $createdService = Service::create([
                'type' => $service['type'],
                'img_path' => $imgPath,
            ]);

            if(isset($service['data']))
            {
                foreach($service['data'] as $index => $languageData)
                {
                    $createdService->languages()->attach([[
                        'language_id' => $languages->where('slug', $index)->first()->id,
                        'title' => $languageData['title'],
                        'description' => $languageData['description'],
                    ]]);
                }
            }
        }
    }
}
