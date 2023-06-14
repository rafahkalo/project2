<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $table='cars';
    protected $fillable = ['type_id','color_id','number','image','cost','driver_id'];

    public function driver()
    {
        return $this->belongsTo(Car::class,'driver_id');
    }
}