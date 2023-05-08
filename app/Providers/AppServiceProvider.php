<?php

namespace App\Providers;

use App\Modules\Game\Db\IInfoDb;
use App\Modules\Game\Db\InfoDb;
use App\Modules\Game\Db\IPriceDb;
use App\Modules\Game\Db\IRuleDb;
use App\Modules\Game\Db\PriceDb;
use App\Modules\Game\Db\RuleDb;
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
        $this->app->bind(IInfoDb::class, InfoDb::class);
        $this->app->bind(IPriceDb::class, PriceDb::class);
        $this->app->bind(IRuleDb::class, RuleDb::class);
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
