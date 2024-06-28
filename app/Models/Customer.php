<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name', // Add the full_name field to the fillable array
        'email',
        'password',
        'address',
        'mobile',
        'photo',
    ];
    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
