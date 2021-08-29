<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::share('recent_posts', \App\Models\Post::orderBy('created_at', 'DESC')->limit('5')->get());
        View::share('popular_posts', \App\Models\Post::orderBy('views', 'DESC')->limit('5')->get());
    }
}
