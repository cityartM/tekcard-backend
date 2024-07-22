<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Modules\Blog\Http\Resources\PostResource;
use Modules\Blog\Models\Blog;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Models\Card;
use Modules\Feature\Models\Feature;
use Modules\Plan\Models\Plan;
use App\Http\Controllers\FrontController;
use Modules\Page\Models\Page;
use Modules\Page\Http\Resources\PageResource;

use App\Http\Controllers\WebhookController;


Route::get('/webhooks/zapier/new-user', [WebhookController::class, 'newUser']);

Route::get('/', function () {
    return Inertia::render('Home');
})->name('landing.home');

Route::get('/card/{reference}', function (string $reference) {
    $card = Card::where('reference_link', $reference)->firstOrFail();
    return Inertia::render('CardShare', [
        "card" => new CardResource($card)
    ]);
});

Route::get('/about-us', function () {
    return Inertia::render('AboutUs');
})->name('landing.about-us');

Route::get('/our-blog', function () {
    $latestPosts = Blog::with('media')->orderByDesc('created_at')->paginate(4);
    return Inertia::render('Blog', [
        "posts" => PostResource::collection($latestPosts),
    ]);
})->name('landing.blog');

Route::get('/our-blog/{blog}', function (Blog $blog) {

    $latestPosts = Blog::with('media')->orderByDesc('created_at')->paginate(4);

    return Inertia::render('BlogSingle', [
        "post"  => new PostResource($blog),
        "posts" => PostResource::collection($latestPosts),
    ]);
})->name('landing.blog.show');

Route::get('/pricing', function () {

    $plans = Plan::query()
        ->with('features')
        ->get();

    $resources = [];

    foreach ($plans as $plan) {
        $features = [];

        foreach ($plan->features as $feature) {
            $features[] = [
                "id" => $feature->id,
                "name" => $feature->name,
                "display_name" => $feature->display_name,
                "removable" => $plan->removable,
            ];
        }

        $resources[] = [
            "id" => $plan->id,
            "name" => $plan->name,
            "display_name" => $plan->display_name,
            "type" => $plan->type,
            "duration" => $plan->duration,
            "price" => $plan->price,
            "nbr_user" => $plan->nbr_user,
            "nbr_card_user" => $plan->nbr_card_user,
            "removable" => $plan->removable,
            "features" => $features
        ];
    }

    $features = Feature::query()
        ->get();

    $allFeatures = [];

    foreach ($features as $feature) {
        $allFeatures[] = [
            "id" => $feature->id,
            "name" => $feature->name,
            "display_name" => $feature->display_name,
            "removable" => $feature->removable,
        ];
    }

    return Inertia::render('Pricing', [
        'plans' => $resources,
        'features' => $allFeatures,
    ]);
})->name('landing.pricing');

Route::get('/contact-us', function () {
    return Inertia::render('ContactUs');
})->name('landing.contact-us');

Route::get('/playground', function () {
    return Inertia::render('Playground');
})->name('landing.playground');

Route::get('/frontend/login', function () {
    return Inertia::render('Auth/Login');
})->name('landing.login.get')->middleware('guest');

Route::get('/frontend/register', function () {
    return Inertia::render('Auth/Register');
})->name('landing.register.get')->middleware('guest');

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

Route::get('/custom_page', function () {

    $page = Page::where('name', 'about_us')->first();
    return Inertia::render('About_us', [
        "post"  => new PageResource($page),

    ]);
})->name('landing.custom_page');


Route::get('/privacy_policy', function () {
    return view('privacy-policy');
})->name('privacy_policy');

//Route::get('/card/{ref}', 'FrontController@show')->name('card.show');
Route::get('/card/{ref}', [FrontController::class, 'show'])->name('card.show');

Route::post('/send-card-by-email/{card}', [FrontController::class, 'sendCardByEmail'])->name('send-card-by-email');


