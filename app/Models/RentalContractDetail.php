<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalContractDetail extends Model
{
    public function office(){
        return $this->belongsTo('App\Models\Office','office_id');
    }
}
