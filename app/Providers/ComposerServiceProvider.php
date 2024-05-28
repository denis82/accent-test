<?php

namespace App\Providers;

use App\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $slug = app(App::class)->getPrefixWeb();
        $cityItem = collect(session()->get('cities'))->firstWhere('slug', $slug);
        View::composer(['web.layouts.head'], function($view) use ($cityItem) {
            $view->with([
                'city' => ($cityItem) ? $cityItem['name'] : ""
            ]);
        });
    }
}
