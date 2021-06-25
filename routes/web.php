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


Route::get('/home', function () {
    return view('admin.home');
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
        Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
        Route::get('/posts', [App\Http\Controllers\HomeController::class, 'posts'])->name('posts');
        Route::get('/posts/{posts}', [App\Http\Controllers\HomeController::class, 'show'])->name('posts.single');
        Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
    }
);
