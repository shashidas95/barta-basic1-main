<?php

namespace App\Providers;

use App\View\Components\Textarea;
use App\View\Components\FileInput;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::component('file-input', FileInput::class);
        Blade::component('textarea', Textarea::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
