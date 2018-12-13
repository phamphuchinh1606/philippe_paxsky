<?php

namespace App\Common;

use Storage;
use Image;
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
        if(str_contains($image,"http")){
            return $image;
        }
        return asset(Constant::$PATH_URL_UPLOAD_IMAGE.$image);
    }

    public static function moveImage(UploadedFile $file, $pathFolder){
        if(isset($file)){
            $filename = time().'_'.$file->getClientOriginalName();
            $fileNameUpload = Storage::putFileAs($pathFolder, $file, $filename);
            return $fileNameUpload;
        }
        return "";
    }

    public static function moveImageThumbnail($file, $pathFolder){
        $thumbnailWidth = env('ThumnailWidth',150);
        $thumbnailHeight = env('ThumnailHeight',null);
        if($file instanceof UploadedFile){
            $img = Image::make($file->getRealPath());
            $filename = time().'_'.$file->getClientOriginalName();
        }else{
            $img = Image::make($file);
            $array = explode('/',$file);
            $filename = $array[count($array) - 1];
        }
        $destinationPath = $pathFolder.Constant::$PATH_FOLDER_IMAGE_THUMBNAIL;
        $imageThumbnail = $img->resize($thumbnailWidth, $thumbnailHeight, function ($constraint) {
            $constraint->aspectRatio();
        });
        if(!Storage::exists($destinationPath)) {
            Storage::makeDirectory($destinationPath); //creates directory
        }
        Storage::put($destinationPath.'/'.$filename, (string) $imageThumbnail->encode());
        return $destinationPath.'/'.$filename;
    }

    public static function moveImageBuilding(UploadedFile $file, $productId){
        return AppCommon::moveImage($file, Constant::$PATH_FOLDER_UPLOAD_BUILDING.'/'.$productId);
    }

    public static function moveImageBuildingThumbnail(UploadedFile $file, $productId){
        return self::moveImageThumbnail($file, Constant::$PATH_FOLDER_UPLOAD_BUILDING.'/'.$productId);
    }

    public static function movePathImageBuildingThumbnail($pathImage, $productId){
        if(Storage::exists($pathImage)){
            $file = Storage::path($pathImage);
            dump($file);
            return self::moveImageThumbnail($file, Constant::$PATH_FOLDER_UPLOAD_BUILDING.'/'.$productId);
        }
        return "";
    }

    public static function moveImageOfficeThumbnail($image, $officeId){
        return self::moveImageThumbnail($image, Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId);
    }

    public static function movePathImageOfficeThumbnail($pathImage, $officeId){
        if(Storage::exists($pathImage)){
            $file = Storage::path($pathImage);
            return self::moveImageThumbnail($file, Constant::$PATH_FOLDER_UPLOAD_OFFICE.'/'.$officeId);
        }
        return "";
    }
}
