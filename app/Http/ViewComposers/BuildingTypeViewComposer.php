<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\BuildingTypeService;

class BuildingTypeViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $buildingTypeService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(BuildingTypeService $buildingTypeService)
    {
        // Dependencies automatically resolved by service container...
        $this->buildingTypeService = $buildingTypeService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $buildingTypes = $this->buildingTypeService->getAll();
        $view->with('buildingTypes', $buildingTypes);
    }
}
