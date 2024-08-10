<?php

namespace App\Http\Controllers;

use App\Services\{
    BannerService,
    PageService,
    ServiceService,
};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $bannerService;
    protected $pageService;

    protected $serviceService;


    /**
     * HomeController constructor.
     *
     * @param BannerService $bannerService
     * @param PageService $pageService
     */
    public function __construct(BannerService $bannerService, PageService $pageService,ServiceService $serviceService)
    {
        $this->bannerService = $bannerService;
        $this->pageService = $pageService;
        $this->serviceService = $serviceService;
    }

    /**
     * Display the home page with banner images and pages of different types.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch all banner images using the BannerService
        $banners = $this->bannerService->getAllBanners();

        // Fetch pages of different types using the PageService
        $aboutPage = $this->pageService->getPagesByType('about')->first();
        $contactPage = $this->pageService->getPagesByType('contact')->first();
        $ourVisionPage = $this->pageService->getPagesByType('our-vision')->first();
        $footerPage = $this->pageService->getPagesByType('footer')->first();

         // Fetch services of type 'legal' using the ServiceService
         $legalServices = $this->serviceService->getServicesByType('legal');

        // Pass the banner data and pages to the view
        return view('home', compact('banners', 'aboutPage', 'contactPage', 'ourVisionPage', 'footerPage', 'legalServices'));
    }
}
