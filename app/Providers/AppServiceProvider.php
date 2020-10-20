<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Auth;

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
        View::composer('layouts.guru_app', function ($view) {
            $view->with('rangkum', \App\Files::get());
            $view->with('tanya', \App\FileTanya::get());
            $view->with('prediksi', \App\FilePrediksi::get());
        });

        View::composer('layouts.siswa_app', function ($view) {
            $view->with('rangkum', \App\Files::get());
            $view->with('tanya', \App\FileTanya::get());
            $view->with('prediksi', \App\FilePrediksi::get());
        });

        Schema::defaultStringLength(191);
    }
}
