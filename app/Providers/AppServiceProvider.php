<?php

namespace App\Providers;

use App\Interfaces\DiscoveryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\DiscoveryRepository;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
     public function register()
     {
         $this->app->bind(DiscoveryRepositoryInterface::class, function () {
             return new DiscoveryRepository();
           });
     }


}
