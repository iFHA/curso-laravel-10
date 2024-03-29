<?php

namespace App\Providers;

use App\Models\Support;
use App\Observers\SupportObserver;
use App\Repositories\Contracts\Eloquent\ReplySupportEloquentORMRepository;
use App\Repositories\Contracts\Eloquent\SupportEloquentORMRepository;
use App\Repositories\Contracts\ReplySupportRepository;
use App\Repositories\Contracts\SupportRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SupportRepository::class, SupportEloquentORMRepository::class);
        $this->app->bind(ReplySupportRepository::class, ReplySupportEloquentORMRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Support::observe(SupportObserver::class);
    }
}
