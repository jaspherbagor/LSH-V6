<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    
    public function RoomPhotos()
    {
        return $this->hasMany(RoomPhoto::class);
    }

    public function roomRates() {
        return $this->hasMany(RoomRate::class);
    }
}
