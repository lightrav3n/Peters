<?php

namespace App\Providers;

use App\Models\ProductCategories;
use App\Models\SiteOptions;
use App\Services\Configurator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        view()->composer('*', function ($view){
           if(!Session::has('language')){
               Session::put('language','de');
               Session::save();
               App::setLocale('de');
           }
           $oldConfig = Session::get('config');
           $configuration = new Configurator($oldConfig);

           View::share(['configProducts'=>$configuration->items]);
        });
        $siteSettings = cache()->remember(
            key: 'siteSettings',
            ttl: 86400,
            callback: fn() => SiteOptions::all()->keyBy('option_name')
        );

        $offers = ProductCategories::query()->where('slug', 'offers')->with('products', function ($q){
            $q->where('visibility', '1');
        })->first();

        View::share(['siteSettings' => $siteSettings, 'offers' => $offers]);
    }
}
