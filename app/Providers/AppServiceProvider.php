<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Ministerio;
use DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Log;

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
    public function boot(){
        Schema::defaultStringLength(191);
        if (Schema::hasTable('municipios')) {
            $_min = Municipio::select(DB::raw("CONCAT(id,' - ',nombre) AS nombre"), 'id')
            ->orderby('id', 'asc')
            ->pluck('nombre', 'id');
            View::share('_min', $_min);
            dd($_min);
        } 
        //DB::listen(function($query) {
        //    Log::info(
        //        $query->sql,
        //        $query->bindings,
        //        $query->time
        //    );
        //});
    }
}
