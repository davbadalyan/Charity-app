<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MainSliderController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VolunteerController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();

Route::redirect('/home', '/admin');

// Route::post('/lang', [LocalizationController::class, 'setLanguage'])->name('lang.set');
Route::get('/lang', [LocalizationController::class, 'setLanguage'])->name('lang.set');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {

    Route::get('/', DashboardController::class);

    Route::resource('events', EventController::class);

    Route::resource('posts', PostController::class);

    Route::resource('volunteers', VolunteerController::class);

    Route::resource('main_slider', MainSliderController::class, ['only' => ['index', 'edit', 'update']]);

    Route::get('/media/set_main_posts/{post}/{media}', [MediaController::class, 'setPostMainImage'])->name('posts.media.main-image');
    Route::get('/media/set_main_events/{event}/{media}', [MediaController::class, 'setEventMainImage'])->name('events.media.main-image');
    Route::get('/media/set_main_slider/{main_slider}/{media}', [MediaController::class, 'setMainSliderMainImage'])->name('main_slider.media.main-image');
    Route::delete('/media/{media}', [MediaController::class, 'delete'])->name('media.delete');

    Route::post('/volunteers/send-email', [VolunteerController::class, 'sendEmail'])->name('volunteers-send-email');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeCookieRedirect', 'localizationRedirect']
    ],
    function () {
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
        Route::get('/posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');
        Route::get('/posts/{post}', [App\Http\Controllers\HomeController::class, 'show'])->name('posts.single');
        Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

        Route::post('/volunteers/register', [App\Http\Controllers\NotificationController::class, 'volunteerRegister'])->name('volunteers.registration');
    }
);
