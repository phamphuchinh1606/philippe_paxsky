<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_type_id','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute(){
        return $this->first_name.' ' . $this->last_name;
    }

    public function userType(){
        return $this->belongsTo('App\Models\UserType','user_type_id');
    }

    public function customers(){
        return $this->hasMany('App\Models\Customer','user_id');
    }
}
