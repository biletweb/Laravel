<?php

namespace App\Providers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        if (config('app.locale') == 'ua') {
            $locale = 'uk';
        } else {
            $locale = config('app.locale');
        }

        Carbon::setLocale($locale);

        Paginator::useBootstrapFive();

        view()->composer(['include.menu', 'posts.create', 'posts.edit'], function ($view) {
            $view->with(['categories' => Category::all()]);
        });
    }
}
