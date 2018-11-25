<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\OfficeService;

class OfficeStatusViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $officeService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(OfficeService $officeService)
    {
        // Dependencies automatically resolved by service container...
        $this->officeService = $officeService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $officeStatuses = $this->officeService->getStatusAll();
        $view->with('officeStatuses', $officeStatuses);
    }
}
