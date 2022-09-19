<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public function admins(){
        return $this->hasMany(Admin::class);
    }
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
    public function item_hotels(){
        return $this->hasMany(ItemHotel::class);
    }
    public function users(){
        return $this->hasMany(User::class);
    }
}
