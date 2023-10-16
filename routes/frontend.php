<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::get('/home', function () {
        return Inertia::render('Home');
    })->name('landing.home');

    Route::get('/about-us', function () {
        return Inertia::render('AboutUs');
    })->name('landing.about-us');

    Route::get('/blog', function () {
        return Inertia::render('Blog');
    })->name('landing.blog');

    Route::get('/pricing', function () {
        return Inertia::render('Pricing');
    })->name('landing.pricing');

    Route::get('/contact-us', function () {
        return Inertia::render('ContactUs');
    })->name('landing.contact-us');

    Route::get('/playground', function () {
        return Inertia::render('Playground');
    })->name('landing.playground');
});



