<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalContractCustomer extends Model
{
    public function customer(){
        return $this->belongsTo('App\Models\Customer','customer_id');
    }
}
