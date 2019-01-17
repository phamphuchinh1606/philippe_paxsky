<?php

namespace App\Common;

class Constant{
    public static $DELETE_FLG_ON = 1;
    public static $DELETE_FLG_OFF = 0;

    public static $PUBLIC_FLG_ON = 1;
    public static $PUBLIC_FLG_ON_NAME = "Public";
    public static $PUBLIC_FLG_OFF = 0;
    public static $PUBLIC_FLG_OFF_NAME = "Un Public";

    public static $ACTIVE_FLG_ON = 1;
    public static $ACTIVE_FLG_ON_NAME = "Active";
    public static $ACTIVE_FLG_OFF = 0;
    public static $ACTIVE_FLG_OFF_NAME = "UnActive";

    public static $STATUS_READ_ON = 1;
    public static $STATUS_READ_ON_NAME = "Đã đọc";
    public static $STATUS_READ_OFF = 0;
    public static $STATUS_READ_OFF_NAME = "Chưa đọc";

    public static $PATH_FOLDER_IMAGE_THUMBNAIL = "/thumbnail";

    public static $PATH_FOLDER_UPLOAD_IMAGE_EDITOR = "images_editor";
    public static $PATH_FOLDER_UPLOAD_IMAGE_DROP = "images_drop";
    public static $PATH_FOLDER_UPLOAD_BUILDING = "buildings";
    public static $PATH_FOLDER_UPLOAD_OFFICE_LAYOUT = "officeLayouts";
    public static $PATH_FOLDER_UPLOAD_OFFICE = "offices";
    public static $PATH_FOLDER_UPLOAD_USER = "users";
//    public static $PATH_URL_UPLOAD_IMAGE = "storage/";
    public static $PATH_URL_UPLOAD_IMAGE = "storage/app/public/";

    public static $URL_PAXSKY = "";

    public function __construct()
    {
        self::$URL_PAXSKY = env('APP_URL','');
        self::$PATH_URL_UPLOAD_IMAGE = env('PATH_URL_UPLOAD_IMAGE','storage/');
    }

    //Unit
    public static $UNIT_ACREAGE = "m2";
    public static $UNIT_RENT_COST = "$/m2";
    public static $UNIT_ELECTRIC_COST = "K/W giờ";
    public static $UNIT_AMOUNT = "$";

    public static $GENDER_MALE = "male";
    public static $GENDER_FEMALE = "female";

    public static $PROVINCE_ID_HCM= "4";

    //Group Customer
    public static $GROUP_CUSTOMER_VISIT = "1";

    //Status Appointment
    public static $APPOINTMENT_STATUS_PENDING = "0";
    public static $APPOINTMENT_STATUS_PENDING_NAME = "Pending";
    public static $APPOINTMENT_STATUS_SCHEDULE = "1";
    public static $APPOINTMENT_STATUS_SCHEDULE_NAME = "Schedule";
    public static $APPOINTMENT_STATUS_CANCEL = "2";
    public static $APPOINTMENT_STATUS_CANCEL_NAME = "Cancel";
    public static $APPOINTMENT_STATUS_DONE = "3";
    public static $APPOINTMENT_STATUS_DONE_NAME = "Done";

    //Status Contract
    public static $CONTRACT_STATUS_NEW = 0;
    public static $CONTRACT_STATUS_NEW_NAME = "New";
    public static $CONTRACT_STATUS_BOOKING = 1;
    public static $CONTRACT_STATUS_BOOKING_NAME = "Booking";
    public static $CONTRACT_STATUS_RENTED = 2;
    public static $CONTRACT_STATUS_RENTED_NAME = "Rented";
    public static $CONTRACT_STATUS_EXPIRED = 3;
    public static $CONTRACT_STATUS_EXPIRED_NAME = "Expired";
    public static $CONTRACT_STATUS_CANCELLED = 4;
    public static $CONTRACT_STATUS_CANCELLED_NAME = "Cancelled";

    //Status Contract
    public static $OFFICE_STATUS_EMPTY = 1;
    public static $OFFICE_STATUS_PLACED = 2;
    public static $OFFICE_STATUS_HIRED = 3;
    public static $OFFICE_STATUS_FIXING = 4;

    //Driver social login
    public static $PROVIDER_SOCIAL_FACEBOOK = "facebook";
    public static $PROVIDER_SOCIAL_MOBILE_PHONE = "phone";

}
