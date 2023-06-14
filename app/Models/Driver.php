<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    
    protected $table='drivers';
    public $timestamps=false;
    protected $fillable = ['office_id','address','status','image2','image1','last_name','first_name','email','password','phoneOne','phoneTwo'];

    public function car()
    {
        return $this->belongsTo(Car::class,'id');
    }
}