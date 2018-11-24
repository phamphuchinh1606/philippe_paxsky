<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['common.__select_building_type'],
            'App\Http\ViewComposers\BuildingTypeViewComposer'
        );
        View::composer(
            ['common.__select_classification'],
            'App\Http\ViewComposers\ClassifyViewComposer'
        );
        View::composer(
            ['common.__select_direction'],
            'App\Http\ViewComposers\DirectionViewComposer'
        );
        View::composer(
            ['common.__select_investor'],
            'App\Http\ViewComposers\InvestorViewComposer'
        );
        View::composer(
            ['common.__select_management_agency'],
            'App\Http\ViewComposers\ManagementAgencyViewComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
