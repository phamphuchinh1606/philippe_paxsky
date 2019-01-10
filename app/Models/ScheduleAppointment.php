<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleAppointment extends Model
{

    public function user(){
        return $this->belongsTo('App\User','sale_person_id');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }

    public function building(){
        return $this->belongsTo('App\Models\Building','building_id');
    }

    public function office(){
        return $this->belongsTo('App\Models\Office','office_id');
    }
}
