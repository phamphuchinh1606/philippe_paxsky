<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\DirectionService;

class DirectionViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $directionService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(DirectionService $directionService)
    {
        // Dependencies automatically resolved by service container...
        $this->directionService = $directionService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $directions = $this->directionService->getAll();
        $view->with('directions', $directions);
    }
}
