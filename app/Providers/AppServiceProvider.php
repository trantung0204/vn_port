<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Admin\OptionValue;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $introduce_html=OptionValue::where('option_id',2)->where('value',0)->first()->name;
        $contact_html=OptionValue::where('option_id',1)->where('value',0)->first()->name;
        $map_html=OptionValue::where('option_id',1)->where('value',1)->first()->name;
        View::share(['introduce_html'=> $introduce_html,'contact_html'=>$contact_html,'map_html'=>$map_html]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
