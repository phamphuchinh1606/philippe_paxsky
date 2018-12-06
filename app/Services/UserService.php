<?php

namespace App\Services;
use App\Common\Constant;
use App\Logics\UserLogic;
use App\User;
use Illuminate\Http\Request;
use App\Common\AppCommon;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService{
    private $userLogic;

    public function __construct(UserLogic $userLogic)
    {
        $this->userLogic = $userLogic;
    }

    public function find($id){
        return $this->userLogic->find($id);
    }

    public function checkLogin($email, $password){
        $user = $this->userLogic->checkLogin($email, bcrypt($password));
        if(isset($user)){
            if (Hash::check($password, $user->password))
            {
                return true;
            }
        }
        return false;
    }

    public function getAll(){
        $users = $this->userLogic->getAll();
        foreach ($users as $user){
            $user->active_name = AppCommon::getActiveName($user->is_active);
            $user->full_name = $user->first_name.' '.$user->last_name;
        }
        return $users;
    }

    public function getUserByType($userTypeId){
        return $this->userLogic->getUserByType($userTypeId);
    }

    public function getUserTypeAll(){
        return $this->userLogic->getUserTypeAll();
    }

    private function getUserInfo(Request $request, $user = null){
        if(!isset($user)){
            $user = new User();
        }
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_type_id = $request->user_type_id;
        $user->email = $request->email;
        $user->mobile_phone = $request->mobile_phone;
        if(!isset($user->id)){
            $user->password = bcrypt($request->password);
        }
        $user->note = $request->note;
        $user->is_active = AppCommon::getIsPublic($request->is_active);
        return $user;
    }

    public function create(Request $request){
        $user = $this->getUserInfo($request);
        if($user->email != null){
            $userDB = $this->userLogic->save($user);
            if(isset($userDB->id)){
                $userId = $userDB->id;
                $userImage = $request->file('profile_image');
                if(isset($userImage)){
                    $imageName = AppCommon::moveImage($userImage, Constant::$PATH_FOLDER_UPLOAD_USER.'/'.$userId);
                    $userDB->profile_image = $imageName;
                    $user = $this->userLogic->save($userDB);
                }
            }
        }
        return $user;
    }

    public function update($id, $request){
        $userDB = $this->userLogic->find($id);
        if(isset($userDB)){
            $user = $this->getUserInfo($request,$userDB);
            $userId = $user->id;
            $userImage = $request->file('profile_image');
            if(isset($userImage)){
                AppCommon::deleteImage($userDB->profile_image);
                $imageName = AppCommon::moveImage($userImage, Constant::$PATH_FOLDER_UPLOAD_USER.'/'.$userId);
                $user->profile_image = $imageName;
            }
            $user = $this->userLogic->save($user);
        }
    }

    public function destroy($id){
        $user = $this->userLogic->find($id);
        if(isset($user)){
            $user->is_delete = Constant::$DELETE_FLG_ON;
            $this->userLogic->save($user);
        }
    }

}
