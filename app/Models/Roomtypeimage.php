<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtypeimage extends Model
{
    use HasFactory;
    function roomtype(){
        return $this->belongsTo(RoomType::class);
    }
}
