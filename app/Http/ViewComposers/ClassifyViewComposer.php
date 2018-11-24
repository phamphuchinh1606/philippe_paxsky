<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\ClassificationService;

class ClassifyViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $classifyService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(ClassificationService $classifyService)
    {
        // Dependencies automatically resolved by service container...
        $this->classifyService = $classifyService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $classifies = $this->classifyService->getAll();
        $view->with('classifies', $classifies);
    }
}
