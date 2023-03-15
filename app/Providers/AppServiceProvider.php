<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191); 
        view()->composer('*', function($view){
            $key_data = User::select(
            'first_name', 
            'last_name', 
            'email', 
            'profile_pic'
            )->where('id', Auth::id())->first();

            $sett = Setting::first();

            $view->with(['key_data'=> $key_data, 'sett'=>$sett]);
        });
    }
}
