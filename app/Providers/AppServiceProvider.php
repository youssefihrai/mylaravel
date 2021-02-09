<?php

namespace App\Providers;

use App\Http\ViewComposer\ActivityComposer;
use App\Observers\PostObserver;
use App\Post;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

use ConsoleTVs\Charts\Registrar as Charts;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', ActivityComposer::class );
   Post::observe(PostObserver::class);
   JsonResource::withoutWrapping();


}
}
