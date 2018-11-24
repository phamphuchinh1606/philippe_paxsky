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

    public static function namePublicOrderStatus($statusValue){
        $statusName = "";
        switch ($statusValue){
            case Constant::$ORDER_STATUS_NEW_CODE:
                $statusName = Constant::$ORDER_STATUS_NEW_NAME;
                break;
            case Constant::$ORDER_STATUS_CONFIRM_CODE:
                $statusName = Constant::$ORDER_STATUS_CONFIRM_NAME;
                break;
            case Constant::$ORDER_STATUS_SHIPPING_CODE:
                $statusName = Constant::$ORDER_STATUS_SHIPPING_NAME;
                break;
            case Constant::$ORDER_STATUS_FINISH_CODE:
                $statusName = Constant::$ORDER_STATUS_FINISH_NAME;
                break;
            case Constant::$ORDER_STATUS_CANCEL_CODE:
                $statusName = Constant::$ORDER_STATUS_CANCEL_NAME;
                break;
        }
        return $statusName;
    }

    public static function classPublicOrderStatus($statusValue){
        $className = "";
        switch ($statusValue){
            case Constant::$ORDER_STATUS_NEW_CODE:
                $className = 'badge-secondary';
                break;
            case Constant::$ORDER_STATUS_CONFIRM_CODE:
                $className = 'badge-primary';
                break;
            case Constant::$ORDER_STATUS_SHIPPING_CODE:
                $className = 'badge-warning';
                break;
            case Constant::$ORDER_STATUS_FINISH_CODE:
                $className = 'badge-success';
                break;
            case Constant::$ORDER_STATUS_CANCEL_CODE:
                $className = 'badge-danger';
                break;
        }
        return $className;
    }

    public static function namePublicProductType($statusValue){
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

    public static function classPublicProductType($statusValue){
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

    public static function moveImage(UploadedFile $file, $pathFolder){
        if(isset($file)){
            $filename = time().'_'.$file->getClientOriginalName();
            $fileNameUpload = Storage::putFileAs($pathFolder, $file, $filename);
            return $fileNameUpload;
        }
        return "";
    }

    public static function moveImageProduct(UploadedFile $file, $productId){
        return AppCommon::moveImage($file, Constant::$PATH_FOLDER_UPLOAD_PRODUCT.'/'.$productId);
    }

    public static function deleteImage($imageName){
        if(Storage::exists($imageName)){
            Storage::delete($imageName);
        }
    }

    public static function formatMoney($value){
        return number_format($value);
    }
}
