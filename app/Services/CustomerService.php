<?php

namespace App\Services;
use App\Common\Constant;
use App\Common\DateCommon;
use App\Common\UserTypeConstant;
use App\Logics\CustomerLogic;
use App\Logics\UserLogic;
use App\Models\Customer;
use App\User;
use Illuminate\Http\Request;
use App\Common\AppCommon;
use DB;
use Illuminate\Support\Facades\Hash;

class CustomerService extends BaseService{
    private $customerLogic;

    private $userLogic;

    private $userService;

    public function __construct(CustomerLogic $customerLogic, UserLogic $userLogic, UserService $userService)
    {
        $this->customerLogic = $customerLogic;
        $this->userLogic = $userLogic;
        $this->userService = $userService;
    }

    public function find($id){
        return $this->customerLogic->find($id);
    }

    public function findUserId($userId){
        return $this->customerLogic->findUserId($userId);
    }

    public function getAll(){
        $customers = $this->customerLogic->getAll();
        foreach ($customers as $customer){
            if(isset($customer->user)){
                $customer->active_name = AppCommon::getActiveName($customer->user->is_active);
            }else{
                $customer->active_name = '';
            }

            $customer->full_name = $customer->first_name.' '.$customer->last_name;
        }
        return $customers;
    }

    public function getGroupCustomerAll(){
        return $this->customerLogic->getGroupCustomerAll();
    }

    private function getCustomerInfo(Request $request, $customer = null, $user = null){
        if(!isset($customer)){
            $customer = new Customer();
        }
        if(!isset($user)){
            $user = new User();
        }
        if(isset($request->first_name)){
            $customer->first_name = $request->first_name;
        }
        if(isset($request->last_name)){
            $customer->last_name = $request->last_name;
        }
        if(isset($request->email)){
            $customer->email = $request->email;
        }
        if(isset($request->mobile_phone)){
            $customer->mobile_phone = $request->mobile_phone;
        }
        if(isset($request->birthday)){
            $customer->birthday = $request->birthday;
        }
        if(isset($request->gender)){
            $customer->gender = $request->gender;
        }
        if(isset($request->group_id)){
            $customer->group_id = $request->group_id;
        }
        if(isset($request->province_id)){
            $customer->province_id = $request->province_id;
        }
        if(isset($request->district_id)){
            $customer->district_id = $request->district_id;
        }

        //Set info user login
        if(isset($request->first_name)){
            $user->first_name = $request->first_name;
        }
        if(isset($request->last_name)){
            $user->last_name = $request->last_name;
        }
        if(isset($request->email)){
            $user->email = $request->email;
        }
        if(isset($request->mobile_phone)){
            $user->mobile_phone = $request->mobile_phone;
        }
        if(isset($request->is_active)){
            $user->is_active = AppCommon::getIsPublic($request->is_active);
        }else if(null == $request->is_active){
            $user->is_active = AppCommon::getIsPublic($request->is_active);
        }
        if(isset($request->note)){
            $user->note = $request->note;
        }
        if(isset($user) && !isset($user->id)){
            $user->password = bcrypt($request->password);
        }
        $data = new \StdClass();
        $data->customer = $customer;
        $data->user = $user;
        return $data;
    }

    public function create(Request $request){
        $data = $this->getCustomerInfo($request);
        $customer = $data->customer;
        $user = $data->user;
        if($user->email != null){
            try{
                DB::beginTransaction();
                $user->user_type_id = UserTypeConstant::$USER_TYPE_CUSTOMER;
                $userDB = $this->userLogic->save($user);
                if(isset($userDB)){
                    $customer->user_id = $userDB->id;
                    $customer = $this->customerLogic->save($customer);
                    $customerImage = $request->file('profile_image');
                    if(isset($customerImage)){
                        $imageName = AppCommon::moveImage($customerImage, Constant::$PATH_FOLDER_UPLOAD_USER.'/'.$userDB->id);
                        $userDB->profile_image = $imageName;
                        $this->userLogic->save($userDB);
                    }
                }
                DB::commit();

            }catch (\Exception $ex){
                DB::rollBack();
            }
        }
        return $customer;
    }

    public function update($id, $request){
        $customerDB = $this->customerLogic->find($id);
        if(isset($customerDB)){
            $userDB = $customerDB->user;
            $data = $this->getCustomerInfo($request,$customerDB,$userDB);
            $customer = $data->customer;
            $user = $data->user;
            if(isset($user->email)){
                $customerImage = $request->file('profile_image');
                if(isset($customerImage)){
                    AppCommon::deleteImage($userDB->profile_image);
                    $imageName = AppCommon::moveImage($customerImage, Constant::$PATH_FOLDER_UPLOAD_USER.'/'.$userDB->id);
                    $user->profile_image = $imageName;
                }
                $this->userLogic->save($user);
                $this->customerLogic->save($customer);
            }
        }
    }

    public function destroy($id){
        $customer = $this->customerLogic->find($id);
        if(isset($customer)){
            $customer->is_delete = Constant::$DELETE_FLG_ON;
            $this->customerLogic->save($customer);

            $this->userService->destroy($customer->user_id);

        }
    }

    public function searchCustomer($fullName , $email, $phoneNumber){
        $customers = $this->customerLogic->searchCustomer($fullName, $email, $phoneNumber);
        return $customers;
    }

}
