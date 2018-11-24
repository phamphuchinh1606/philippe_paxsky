<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\InvestorService;

class InvestorViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $investorService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(InvestorService $investorService)
    {
        // Dependencies automatically resolved by service container...
        $this->investorService = $investorService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $investors = $this->investorService->getAll();
        $view->with('investors', $investors);
    }
}
