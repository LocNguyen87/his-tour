<?php

namespace App\Providers;

use Laravel\Nova\Nova;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;
use Remipou\NovaPageManager\PageResource;
use Silvanite\NovaToolPermissions\NovaToolPermissions;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'loc@breakfield.com.vn',
                'vunhu@breakfield.com.vn',
                'kawasaki.keisuke@his-world.com',
                'nguyen.thituyettran@his-world.com',
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new \ChrisWare\NovaClockCard\NovaClockCard())
            ->locale('vi')
            ->dateFormat('dddd, Do MMMM YYYY')
            ->timeFormat('LTS')
            ->timezone('UTC+7')
            ->display('text'),
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
          new NovaToolPermissions(),
        ];
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }

    protected function resources()
    {
        Nova::resourcesIn(app_path('Nova'));
        Nova::resources([
            PageResource::class,
        ]);
    }
}
