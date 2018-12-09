<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Common\Constant;
use Storage;

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
    ContractService};

class Controller extends BaseController
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

    protected $contractService;

    public function __construct(BuildingTypeService $buildingTypeService, InvestorService $investorService,
                                ClassificationService $classificationService, ManagementAgencyService $managementAgencyService,
                                DirectionService $directionService, BuildingService $buildingService,
                                BuildingImageService $buildingImageService, OfficeLayoutService $officeLayoutService,
                                OfficeService $officeService, UserService $userService, CustomerService $customerService,
                                AddressService $addressService, AppointmentService $appointmentService,
                                ContractService $contractService)
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
        $this->contractService = $contractService;
    }

    public function uploadImageQuillEditor(Request $request){
        $data = $request->src_image;
        $dataJson = ['status' => 'error',
            'src_image' => ''];
        if(preg_match('/data:image\/(gif|jpeg|png);base64,(.*)/i', $data, $matches))
        {
            $imageType = $matches[1];
            $imageData = base64_decode($matches[2]);
            $filename = time() . '.' . $imageType;
            Storage::put(Constant::$PATH_FOLDER_UPLOAD_IMAGE_EDITOR.'/'.$filename, $imageData);
            $dataJson = ['status' => 'success',
                'src_image' => asset(Constant::$PATH_URL_UPLOAD_IMAGE.Constant::$PATH_FOLDER_UPLOAD_IMAGE_EDITOR.'/'.$filename)];
        } else {
            throw new Exception('Invalid data URL.');
        }
        return response()->json($dataJson);
    }

    public function uploadImage(Request $request){
        $dataJson = ['status' => 'error',
            'src_image' => ''];
        $photos = $request->file('file');
        \Log::info($photos);
        if (!is_array($photos)) {
            $photos = [$photos];
        }
        foreach ($photos as $photo){
            $filename = $photo->getClientOriginalName();
            \Log::info($filename);
            $fileNameUpload = Storage::putFileAs(Constant::$PATH_FOLDER_UPLOAD_IMAGE_DROP, $photo, $filename);
            $dataJson = ['status' => 'success',
                'src_image' => asset(Constant::$PATH_URL_UPLOAD_IMAGE.$fileNameUpload),
                'file_name_upload' => $fileNameUpload
            ];
        }
        return response()->json($dataJson);
    }

    public function deleteImage(Request $request){
        \Log::info($request);
        $dataJson = ['status' => 'error'];
        $fileName = $request->file_name_upload;
        if(isset($fileName)){
            Storage::delete($fileName);
            $dataJson = ['status' => 'success'];
        }
        return response()->json($dataJson);
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
}
