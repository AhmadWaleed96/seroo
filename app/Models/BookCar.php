<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCar extends Model
{
    use HasFactory;
    public function way(){
        return $this->belongsTo(Way::class);
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    
}
