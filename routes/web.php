<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::resource('events', EventController::class);

});
