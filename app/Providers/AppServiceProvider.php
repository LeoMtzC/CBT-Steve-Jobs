<?php

namespace App\Providers;

use Doctrine\DBAL\Schema\View;
use Illuminate\Support\Facades\DB;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $aviso = DB::table('avisos')->where('id', 1)->get();
        view()->share('aviso', $aviso);
    }
}
