<?php

namespace App\Common;

use Storage;
use Illuminate\Http\UploadedFile;

class ImageCommon{

    public static function moveImageLogo(UploadedFile $file){
        if(isset($file)){
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('/images'),$filename);
            return '/images/'.$filename;
        }
        return "";
    }

    public static function deleteImageLogo($fileNameLogo){
        $pathFile = public_path(). $fileNameLogo;
        if(file_exists($pathFile)){
            unlink($pathFile);
        }
    }

    public static function showImage($image){
        if(str_contains($image,Constant::$URL_PAXSKY)){
            return $image;
        }
        return asset(Constant::$PATH_URL_UPLOAD_IMAGE.$image);
    }
}
