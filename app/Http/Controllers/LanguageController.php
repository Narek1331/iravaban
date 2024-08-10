<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Services\LanguageService;
use Illuminate\Support\Facades\Cookie;

class LanguageController extends Controller
{
    /**
     * The Language service instance.
     *
     * @var \App\Services\LanguageService
     */
    protected $languageService;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\LanguageService $languageService
     */
    public function __construct(LanguageService $languageService)
    {
        $this->languageService = $languageService;
    }

    /**
     * Change the application's language.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeLanguage(Request $request)
    {
        $language = $request->input('language');

        if ($this->languageService->isSupportedLanguage($language)) {
            App::setLocale($language);
            session()->put('locale', $language);
            Cookie::queue('locale', $language, 43200);
            setcookie("locale", $language, time() + (86400 * 30), "/"); // 86400 = 1 day

        }

        return redirect()->back();
    }
}
