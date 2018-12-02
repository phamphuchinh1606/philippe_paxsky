<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\UserService;

class UserViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $userService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(UserService $userService)
    {
        // Dependencies automatically resolved by service container...
        $this->userService = $userService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $userTypes = $this->userService->getUserTypeAll();
        $view->with('userTypes', $userTypes);
    }
}
