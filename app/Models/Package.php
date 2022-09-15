<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes;

	protected $with = ['user'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
