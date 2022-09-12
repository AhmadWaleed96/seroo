<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory ,HasRoles;
    public function city(){
        return $this->belongsTo(City::class);
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getImagesAttribute()
    {
        return $this->image;
    }
}
