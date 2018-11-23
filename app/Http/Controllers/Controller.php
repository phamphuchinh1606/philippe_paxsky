<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Services\{BuildingTypeService,
    InvestorService,
    ClassificationService,
    ManagementAgencyService,
    DirectionService};

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $buildingTypeService;

    protected $investorService;

    protected $classificationService;

    protected $managementAgencyService;

    protected $directionService;

    public function __construct(BuildingTypeService $buildingTypeService, InvestorService $investorService,
                                ClassificationService $classificationService, ManagementAgencyService $managementAgencyService,
                                DirectionService $directionService)
    {
        $this->buildingTypeService = $buildingTypeService;
        $this->investorService = $investorService;
        $this->classificationService = $classificationService;
        $this->managementAgencyService = $managementAgencyService;
        $this->directionService = $directionService;
    }
}
