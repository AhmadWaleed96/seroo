<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemHotel extends Model
{
    use HasFactory;
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
