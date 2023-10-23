<?php

namespace App\Providers;

use App\Repositories\Partner\EloquentPartner;
use App\Repositories\Partner\PartnerRepository;
use Illuminate\Support\ServiceProvider;
use Modules\Advice\Repositories\AdviceRepository;
use Modules\Advice\Repositories\EloquentAdvice;
use Modules\Strategy\Repositories\EloquentStrategy;
use Modules\Strategy\Repositories\StrategyRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SubscriptionRepository::class, EloquentSubscription::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
