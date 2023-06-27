<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $table='cars';
<<<<<<< HEAD
    protected $fillable = ['type_id','color_id','number','image','cost'];
=======
    protected $fillable = ['type_id','color_id','number','image','cost','driver_id'];

    public function driver()
    {
        return $this->belongsTo(Car::class,'driver_id');
    }
>>>>>>> 38fac941b19a62499b1fe823b56acd1d48d0e5f8
}