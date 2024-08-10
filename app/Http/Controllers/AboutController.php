<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PageService;

/**
 * Class AboutController
 *
 * Handles the display of the 'about' page.
 *
 * @package App\Http\Controllers
 */
class AboutController extends Controller
{
    /**
     * @var PageService
     */
    protected $pageService;

    /**
     * AboutController constructor.
     *
     * @param PageService $pageService
     */
    public function __construct(PageService $pageService)
    {
        $this->pageService = $pageService;
    }

    /**
     * Display the 'about' page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $aboutPage = $this->pageService->getPagesByType('about')->first();

        return view("about", compact("aboutPage"));
    }
}
