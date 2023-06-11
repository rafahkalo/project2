<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Box_Reservation extends Model
{
    use HasFactory;
    protected $table='box__reservations';
    protected $fillable = ['res_id','content'];
}