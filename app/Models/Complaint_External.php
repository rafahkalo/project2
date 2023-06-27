<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint_External extends Model
{
    use HasFactory;
    
    protected $table='complaint__externals';
    protected $fillable = ['user_id','ex_travel_id','text'];
}