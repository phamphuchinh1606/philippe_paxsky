<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\CustomerService;

class CustomerViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $customerService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(CustomerService $customerService)
    {
        // Dependencies automatically resolved by service container...
        $this->customerService = $customerService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $groupCustomers = $this->customerService->getGroupCustomerAll();
        $view->with('groupCustomers', $groupCustomers);
    }
}
