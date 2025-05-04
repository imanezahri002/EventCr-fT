<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Pagination\Paginator;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
         $this->app->bind(
            'App\Repository\ICategory',
            'App\Repository\implements\CategoryRepository'
        );

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

    }
}
