<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHotel extends Model
{
    use HasFactory;
    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    
    public function users(){
        return $this->belongsTo(User::class);
    }
}
