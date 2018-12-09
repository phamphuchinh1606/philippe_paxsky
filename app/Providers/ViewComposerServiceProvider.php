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
            ['common.__select_building'],
            'App\Http\ViewComposers\BuildingViewComposer'
        );
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
        View::composer(
            ['common.__select_office_status'],
            'App\Http\ViewComposers\OfficeStatusViewComposer'
        );
        View::composer(
            ['common.address.__select_province','common.address.__select_district'],
            'App\Http\ViewComposers\AddressViewComposer'
        );
        View::composer(
            ['common.__select_user_type', 'common.users.__select_user_sale'],
            'App\Http\ViewComposers\UserViewComposer'
        );
        View::composer(
            ['common.__select_group_customer', 'customers.partials.__modal_search_customer'],
            'App\Http\ViewComposers\CustomerViewComposer'
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
