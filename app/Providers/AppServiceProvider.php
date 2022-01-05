<?php

namespace App\Providers;

use App\Contracts\Crm\CrmService;
use App\Services\Crm\Hubspot;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CrmService::class, function () {            
             return new Hubspot();
          });  
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
