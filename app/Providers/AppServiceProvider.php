<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Models\Setting;
use App\Models\Privilege;
use App\Models\PrivilegeRole as Role;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Privilege $privilege, Role $role)
    {
        View::share([
          'setting' => Setting::firstOrFail(),
          'privilege' => $privilege,
          'role' => $role
        ]);
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
