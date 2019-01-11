<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['user_id', 'provider_user_id', 'provider', 'access_token'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}
