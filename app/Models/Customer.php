<?php

namespace App\Models;

use App\Common\Constant;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //

    public function init(){
        $this->user = new User();
        $this->user->is_active = Constant::$ACTIVE_FLG_ON;
        $this->gender = Constant::$GENDER_MALE;
        $this->province_id = Constant::$PROVINCE_ID_HCM;
    }

    public function groupCustomer(){
        return $this->belongsTo('App\Models\GroupCustomer','group_id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function province(){
        return $this->belongsTo('App\Models\Province','province_id');
    }

    public function district(){
        return $this->belongsTo('App\Models\District','district_id');
    }
}
