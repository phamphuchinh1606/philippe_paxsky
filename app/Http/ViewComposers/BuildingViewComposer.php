<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\BuildingService;

class BuildingViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $buildingService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(BuildingService $buildingService)
    {
        // Dependencies automatically resolved by service container...
        $this->buildingService = $buildingService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $buildings = $this->buildingService->getAll();
        $view->with('buildings', $buildings);
    }
}
