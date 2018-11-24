<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\ManagementAgencyService;

class ManagementAgencyViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $managementAgencyService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ManagementAgencyService $managementAgencyService)
    {
        // Dependencies automatically resolved by service container...
        $this->managementAgencyService = $managementAgencyService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $managementAgencies = $this->managementAgencyService->getAll();
        $view->with('managementAgencies', $managementAgencies);
    }
}
