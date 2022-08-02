<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;
use ProtoneMedia\LaravelEloquentWhereNot\WhereNot;

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
        WhereNot::addMacro();
        Paginator::useBootstrap();
        Model::preventLazyLoading(! app()->isProduction());

        $this->app->resolving(LengthAwarePaginator::class, static function (LengthAwarePaginator $paginator) {
            return $paginator->withQueryString();
        });

        $this->app->resolving(Paginator::class, static function (Paginator $paginator) {
            return $paginator->withQueryString();
        });
    }
}
