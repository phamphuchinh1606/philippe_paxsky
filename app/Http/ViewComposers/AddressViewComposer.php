<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Services\AddressService;

class AddressViewComposer
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $addressService;

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct(AddressService $addressService)
    {
        // Dependencies automatically resolved by service container...
        $this->addressService = $addressService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $provinceCodeHCM = "1580578";
//        $provinces = $this->addressService->getProvinceByCode($provinceCodeHCM);
//        $districtHCM = $this->addressService->getDistrictByProvinceCode($provinceCodeHCM);
        $provinces = $this->addressService->getProvinceAll();
        $districts = $this->addressService->getDistrictByProvinceCode($provinceCodeHCM);
        $view->with('provinces', $provinces)->with('districts' , $districts);
    }
}
