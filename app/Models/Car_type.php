<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car_type extends Model
{
    use HasFactory;
    protected $table='car_types';
    protected $fillable = ['name'];
}