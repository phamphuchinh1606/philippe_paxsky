<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalContract extends Model
{
    public function init(){
        $this->customers = [];
    }

    public function customers(){
        return $this->hasMany('App\Models\RentalContractCustomer','rental_contract_id');
    }

    public function offices(){
        return $this->hasMany('App\Models\RentalContractDetail','rental_contract_id');
    }
}
