<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    public function city(){
        return $this->belongsTo(City::class);

    }
    public function images(){
        return $this->hasMany(ImageHotel::class);
    }
    public function rooms(){
        return $this->hasMany(Room::class);
    }
    public function facilitie(){
        return $this->hasMany(Facilitie::class);
    }
    public function bookHotels(){
        return $this->hasMany(BookHotel::class);
    }
    public function item_hotel(){
        return $this->hasOne(ItemHotel::class);
    }
}
