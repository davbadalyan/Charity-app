<?php

namespace App\Providers;

use App\View\Components\Input;
use Astrotomic\Translatable\Locales;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot(Locales $locales)
    {
        View::composer('*', fn ($view) => $view->with('locales', $locales->all()));

        // Blade::component('input', Input::class);
    }
}
