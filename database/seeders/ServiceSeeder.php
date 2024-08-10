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
            ],
            [
                'type' => 'mediator',
                'data' => [
                    'am' => [
                        'title' => 'Միջնորդություն',
                        'description' => 'Միջնորդությունը կարող է լինել հզոր գործիք կարգավորման համար, որտեղ երկու կողմերը չեն կարողանում համաձայնության գալ: Մեր փորձառու միջնորդները կարող են օգնել ձեզ գտնել փոխադարձաբար ընդունելի լուծումներ: Միջնորդությունը համարվում է ավելի շատ գին հասանելի, արագ և պարզ մեթոդ է տարաձայնությունների լուծման համար, քան դատվական գործընթացները: Մենք տրամադրում ենք միջնորդական ծառայություններ տարբեր բնագավառներում, ներառյալ ընտանեկան հարաբերությունները, գործարար վեճերը, աշխատավարձերի վիճակագրությունը և այլ ոլորտներ: Միջնորդի դերը կայանում է այն բանում, որ նա անկախ երրորդ կողմ է, ով օգնում է կողմերին հասնել համաձայնության: Միջնորդության գործընթացը կարող է ներառել բազմաթիվ փուլեր, որոնց ընթացքում մենք կազմակերպում ենք հանդիպումներ, քննարկումներ և բանակցություններ կողմերի միջև, որպեսզի հասնենք փոխադարձապես ընդունելի լուծում: Մեր մասնագետները ունեն լայն փորձություն միջնորդության ոլորտում և կարող են ապահովել, որ գործընթացը ընթանա նրբորեն և արդյունավետ:',
                    ],
                    'ru' => [
                        'title' => 'Медиация',
                        'description' => 'Медиация может быть мощным инструментом для урегулирования, когда две стороны не могут достичь соглашения. Медиация рассматривается как более доступный, быстрый и простой метод разрешения споров по сравнению с судебными процессами. Мы предоставляем услуги медиации в различных областях, включая семейные отношения, бизнес-споры, трудовые конфликты и другие области. Роль медиатора заключается в том, чтобы быть независимой третьей стороной, которая помогает сторонам достичь соглашения. Процесс медиации может включать несколько этапов, в течение которых мы организуем встречи, обсуждения и переговоры между сторонами, чтобы прийти к взаимоприемлемому решению. Наши специалисты имеют большой опыт в области медиации и могут обеспечить, чтобы процесс шел гладко и эффективно.',
                    ],
                    'en' => [
                        'title' => 'Mediation',
                        'description' => 'Mediation can be a powerful tool for resolving disputes when parties cannot reach an agreement. Mediation is considered a more cost-effective, quicker, and simpler method of dispute resolution compared to litigation. We provide mediation services in various areas, including family relations, business disputes, employment conflicts, and other domains. The role of a mediator is to act as an independent third party who helps the parties reach a resolution. The mediation process may involve several stages, during which we organize meetings, discussions, and negotiations between the parties to achieve a mutually acceptable solution. Our experts have extensive experience in mediation and can ensure that the process proceeds smoothly and effectively.',
                    ],
                ],
            ],
            [
                'type' => 'pro-bono-free-legal-aid',
                'img_path' => 'https://blog.lifebacklaw.com/hubfs/shutterstock_2121960653.jpg',
                'data' => [
                    'am' => [
                        'title' => 'Անվճար իրավաբանական օգնություն (PRO BONO)',
                        'description' => 'Մեր ընկերությունը հավատում է արդարության մատչելիությանը բոլորի համար և տրամադրում է անվճար իրավաբանական օգնություն նրանց, ովքեր չունեն բավարար միջոցներ վճարելու մեր ծառայությունների համար:',
                    ],
                    'ru' => [
                        'title' => 'Бесплатная юридическая помощь (PRO BONO)',
                        'description' => 'Наша фирма верит в доступность справедливости для всех и предоставляет бесплатную юридическую помощь тем, кто не имеет достаточных средств для оплаты наших услуг.',
                    ],
                    'en' => [
                        'title' => 'Free Legal Aid (PRO BONO)',
                        'description' => 'Our firm believes in access to justice for all and offers free legal aid to those who lack the financial means to pay for our services.',
                    ],
                ],
            ],
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
