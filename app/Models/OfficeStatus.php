<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfficeStatus extends Model
{
    protected $fillable = [
        'code', 'status_name'
    ];
}
