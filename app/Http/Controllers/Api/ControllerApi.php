<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Services\{BuildingTypeService,
    InvestorService,
    ClassificationService,
    ManagementAgencyService,
    DirectionService,
    BuildingService,
    BuildingImageService,
    OfficeLayoutService,
    OfficeService,
    UserService,
    CustomerService,
    AddressService,
    AppointmentService,
    NewsService};

class ControllerApi extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $buildingTypeService;

    protected $investorService;

    protected $classificationService;

    protected $managementAgencyService;

    protected $directionService;

    protected $buildingService;

    protected $buildingImageService;

    protected $officeLayoutService;

    protected $officeService;

    protected $userService;

    protected $customerService;

    protected $addressService;

    protected $appointmentService;

    protected $newsService;

    public function __construct(BuildingTypeService $buildingTypeService, InvestorService $investorService,
                                ClassificationService $classificationService, ManagementAgencyService $managementAgencyService,
                                DirectionService $directionService, BuildingService $buildingService,
                                BuildingImageService $buildingImageService, OfficeLayoutService $officeLayoutService,
                                OfficeService $officeService, UserService $userService, CustomerService $customerService,
                                AddressService $addressService, AppointmentService $appointmentService,
                                NewsService $newsService)
    {
        $this->buildingTypeService = $buildingTypeService;
        $this->investorService = $investorService;
        $this->classificationService = $classificationService;
        $this->managementAgencyService = $managementAgencyService;
        $this->directionService = $directionService;
        $this->buildingService = $buildingService;
        $this->buildingImageService = $buildingImageService;
        $this->officeLayoutService = $officeLayoutService;
        $this->officeService = $officeService;
        $this->userService = $userService;
        $this->customerService = $customerService;
        $this->addressService = $addressService;
        $this->appointmentService = $appointmentService;
        $this->newsService = $newsService;
    }

    protected function json($data){
        return response()->json($data);
    }

    protected function jsonSuccess($message = 'Success'){
        return $this->json([
            'status'=> '0',
            'message'=> $message
        ]);
    }

    protected function jsonError($errors, $message){
        return $this->json([
            'status'=> '1',
            'error'=> $errors,
            'message'=>'Error! '.$message
        ]);
    }
}
