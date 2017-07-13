<?php

namespace App\Providers;

use App\Contracts\DiscoveryRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Eloquent\DiscoveryRepository;


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
