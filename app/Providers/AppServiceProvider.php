<?php

namespace App\Providers;

use App\Models\Notifications;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Contact;

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
        view()->composer("components.admin-layout", function($view){
            $view->with("contacts", Contact::orderBy("created_at", "DESC")->get());
            $view->with("notifications", Notifications::orderBy("created_at", "DESC")->get());
        });

        Paginator::useBootstrap();
    }
}
