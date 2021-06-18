<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VolunteerController;
use App\Models\Event;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::post('/lang', [LocalizationController::class, 'setLanguage'])->name('lang.set');

Route::group(['prefix' => 'admin', 'middleware' => 'auth', 'as' => 'admin.'], function () {

    Route::resource('events', EventController::class);

    Route::resource('posts', PostController::class);

    Route::resource('volunteers', VolunteerController::class);

    Route::delete('/media/{media}', [MediaController::class, 'delete'])->name('media.delete');

    Route::post('/volunteers/send-email', [VolunteerController::class, 'sendEmail'])->name('volunteers-send-email');
});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeCookieRedirect', 'localizationRedirect']
    ],
    function () {
        Route::get('/welcome', function () {
            
            return view('welcome')->with('event', Event::find(11));
        });

        Route::get('/posts', function () {
            
            return view('posts');
        })->name('posts');
    }
);
