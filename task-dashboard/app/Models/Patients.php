<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patients extends Model
{
    //
    protected $fillable=[
        'name','age','phone','gender','result','type'
    ];
}
