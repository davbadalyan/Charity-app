<?php

namespace App\Providers;

use App\Models\MainSlider;
use App\View\Components\Input;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // dd(LaravelLocalization::getSupportedLocales());
        View::composer('*', function ($view) {
            $all = LaravelLocalization::getSupportedLocales();
            $current = $all[LaravelLocalization::getCurrentLocale()];

            $mainSliderImages = [];
            $mainSlider = MainSlider::find(1);
            if($mainSlider){
                $mainSliderImages = $mainSlider->getMedia();
            }

            $view->with(['mainSliderImages' => $mainSliderImages, 'currentLocale' => $current, 'locales' => LaravelLocalization::getSupportedLanguagesKeys(), 'selectableLocales' => array_filter($all, fn ($lang) => $lang['name'] !== $current['name'])]);
        });

        // Blade::component('input', Input::class);
    }
}
