<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    AboutController,
    ContactController,
    ServiceController,
    LanguageController,
    FeedbackController
};
use Illuminate\Support\Facades\Artisan;
use App\Http\Middleware\LocaleMiddleware;

Route::middleware([LocaleMiddleware::class])->group(function () {

Route::get("/", [HomeController::class,"index"])->name("home");
Route::get("/about", [AboutController::class,"index"])->name("about");
Route::get("/contact", [ContactController::class,"index"])->name("contact");

Route::group(['prefix'=>'service'], function () {
    Route::get('/legal', [ServiceController::class, 'legal'])->name('service.legal');
    Route::get('/pro-bono', [ServiceController::class, 'proBono'])->name('service.pro-bono');
    Route::get('/mediator', [ServiceController::class, 'mediator'])->name('service.mediator');
});

Route::group(['prefix'=>'feedback'], function () {
    Route::post('/', [FeedbackController::class, 'store'])->name('feedback.store');
});

Route::post('/change-language', [LanguageController::class, 'changeLanguage'])->name('change.language');

Route::get("/login", function () {
    return redirect()->route('home');
})->name("login");

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});

});


Route::get('run',function(){
    Artisan::call('migrate:fresh --seed');
    return 'Migration fresh command has been run!';
});




