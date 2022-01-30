<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;

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

        $this->app->resolving(LengthAwarePaginator::class, static function (LengthAwarePaginator $paginator) {
            return $paginator->withQueryString();
        });

        $this->app->resolving(Paginator::class, static function (Paginator $paginator) {
            return $paginator->withQueryString();
        });
    }
}
