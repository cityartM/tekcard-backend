<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix(LaravelLocalization::setLocale().'/')->group(function(){
    Route::get('/', function () {
        return Inertia::render('Home');
    })->name('landing.home');


    Route::get('/about-us', function () {
        return Inertia::render('AboutUs');
    })->name('landing.about-us');

    Route::get('/our-blog', function () {
        return Inertia::render('Blog');
    })->name('landing.blog');

    Route::get('/our-blog/{blog}', function () {
        return Inertia::render('BlogSingle');
    })->name('landing.blog.show');

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

Route::get('/frontend/login', function () {
    return Inertia::render('Auth/Login');
})->name('landing.login.get')->middleware('guest');

Route::get('/frontend/register', function () {
    return Inertia::render('Auth/Register');
})->name('landing.register.get');

Route::post('/contact-us', function () {
    $rules = [
        'subject' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'company' => 'required|string|max:255',
        'message' => 'required|string',
        'email' => 'required|email',
    ];
    request()->validate($rules);

    return redirect()->route('landing.contact-us')->with('success', 'Your message has been sent successfully!');

    //dd(request()->all());
})->name('landing.contact-us.submit');

Route::post('/landing/login', function () {
    $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'password' => 'required|confirmed|string|max:255',
    ];
    request()->validate($rules);

    return redirect()->route('landing.home')->with('success', 'Your message has been sent successfully!');

    //dd(request()->all());
})->name('landing.login');

