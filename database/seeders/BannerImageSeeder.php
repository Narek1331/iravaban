<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Services\FileService;
use App\Models\BannerImage;

class BannerImageSeeder extends Seeder
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
     *
     * @return void
     */
    public function run(): void
    {
        $datas = [
            'https://c4.wallpaperflare.com/wallpaper/307/345/278/scales-wallpaper-preview.jpg',
            'https://c1.wallpaperflare.com/preview/174/1/160/lady-justice-legal-law-justice.jpg',
            'https://e1.pxfuel.com/desktop-wallpaper/355/913/desktop-wallpaper-blind-lady-justice-statue-in-law-office-stock-lady-justice.jpg'
        ];

        foreach($datas as $data)
        {
            $storedPath = $this->fileService->uploadFileByUrl($data);
            if($storedPath)
            {
                BannerImage::create(['img_path'=>$storedPath]);
            }
        }
    }
}
