<?php

namespace App\Common;

use Storage;
use Illuminate\Http\UploadedFile;
use Carbon\Carbon;

class AppCommon{

    public static function showTextDot($value, $lengthText){
        return str_limit($value,$lengthText,'....');
    }

    public static function getIsPublic($value){
        $isPublic = Constant::$PUBLIC_FLG_ON;
        if($value == "Off" || $value == null){
            $isPublic = Constant::$PUBLIC_FLG_OFF;
        }
        return $isPublic;
    }

    public static function nameAppointmentStatus($statusValue){
        $statusName = "";
        switch ($statusValue){
            case Constant::$APPOINTMENT_STATUS_PENDING:
                $statusName = Constant::$APPOINTMENT_STATUS_PENDING_NAME;
                break;
            case Constant::$APPOINTMENT_STATUS_SCHEDULE:
                $statusName = Constant::$APPOINTMENT_STATUS_SCHEDULE_NAME;
                break;
            case Constant::$APPOINTMENT_STATUS_CANCEL:
                $statusName = Constant::$APPOINTMENT_STATUS_CANCEL_NAME;
                break;
            case Constant::$APPOINTMENT_STATUS_DONE:
                $statusName = Constant::$APPOINTMENT_STATUS_DONE_NAME;
                break;
        }
        return $statusName;
    }

    public static function classAppointmentStatus($statusValue){
        $className = "";
        switch ($statusValue){
            case Constant::$APPOINTMENT_STATUS_PENDING:
                $className = 'badge-warning';
                break;
            case Constant::$APPOINTMENT_STATUS_SCHEDULE:
                $className = 'badge-primary';
                break;
            case Constant::$APPOINTMENT_STATUS_CANCEL:
                $className = 'badge-danger';
                break;
            case Constant::$APPOINTMENT_STATUS_DONE:
                $className = 'badge-dark';
                break;
        }
        return $className;
    }

    public static function namePublicBuildingType($statusValue){
        $publicName = "";
        switch ($statusValue){
            case Constant::$PUBLIC_FLG_ON:
                $publicName = Constant::$PUBLIC_FLG_ON_NAME;
                break;
            case Constant::$PUBLIC_FLG_OFF:
                $publicName = Constant::$PUBLIC_FLG_OFF_NAME;
                break;
        }
        return $publicName;
    }

    public static function classPublicBuildingType($statusValue){
        $className = "";
        switch ($statusValue){
            case Constant::$PUBLIC_FLG_ON:
                $className = 'badge-success';
                break;
            case Constant::$PUBLIC_FLG_OFF:
                $className = 'badge-dark';
                break;
        }
        return $className;
    }

    public static function nameStatusIsRead($statusValue){
        $statusReadName = "";
        switch ($statusValue){
            case Constant::$STATUS_READ_OFF:
                $statusReadName = Constant::$STATUS_READ_OFF_NAME;
                break;
            case Constant::$STATUS_READ_ON:
                $statusReadName = Constant::$STATUS_READ_ON_NAME;
                break;
        }
        return $statusReadName;
    }

    public static function classStatusIsRead($statusValue){
        $className = "";
        switch ($statusValue){
            case Constant::$STATUS_READ_OFF:
                $className = 'badge-danger';
                break;
            case Constant::$STATUS_READ_ON:
                $className = 'badge-dark';
                break;
        }
        return $className;
    }

    public static function getActiveName($activeCode){
        $activeName = "";
        switch ($activeCode){
            case Constant::$ACTIVE_FLG_ON:
                $activeName = Constant::$ACTIVE_FLG_ON_NAME;
                break;
            case Constant::$ACTIVE_FLG_OFF:
                $activeName = Constant::$ACTIVE_FLG_OFF_NAME;
                break;
        }
        return $activeName;
    }

    public static function getFloorNameOffice($floorId){
        $floorName = "";
        switch ($floorId){
            case -1:
                $floorName = "Ground Floor";
                break;
            case 0:
                $floorName = "Mezzanine";
                break;
            case 99:
                $floorName = "Rooftop";
                break;
            default:
                $floorName = "Floor ". $floorId;
                break;
        }
        return $floorName;
    }

    public static function copyImage($pathFileSrc , $pathFileDec){
        if(Storage::exists($pathFileSrc)){
            Storage::copy($pathFileSrc,$pathFileDec);
        }
    }

    public static function moveImage(UploadedFile $file, $pathFolder){
        if(isset($file)){
            $filename = time().'_'.$file->getClientOriginalName();
            $fileNameUpload = Storage::putFileAs($pathFolder, $file, $filename);
            return $fileNameUpload;
        }
        return "";
    }

    public static function moveImageBuilding(UploadedFile $file, $productId){
        return AppCommon::moveImage($file, Constant::$PATH_FOLDER_UPLOAD_BUILDING.'/'.$productId);
    }

    public static function deleteImage($imageName){
        if(Storage::exists($imageName)){
            Storage::delete($imageName);
        }
    }

    public static function formatMoney($value){
        return number_format($value);
    }

    public static function formatDouble($value){
        try{
            if($value == (int)$value){
                return number_format($value);
            }
        }catch (\Exception $ex){}

        return number_format($value,2);
    }

    public static function showValueOld($oldName, $value){
        $exit = false;
        eval('$exit= isset($'.$oldName.');');
        if($exit){
            $valueOld = "";
            eval('$valueOld = old($'.$oldName.')');
            return $valueOld;
        }
        return $value;
    }
}
