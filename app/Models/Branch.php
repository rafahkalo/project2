<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table='branches';
    
    public $timestamps=false;
     
   
    protected $fillable=
    [
        
        'name',
        'id_gov',
        
    ];



    public function office()
    {
     return $this->hasMany(Office::class,'id_branch');
 
    }
         
 
    public function goverment()
    {
        return $this->belongsTo(Goverments::class,'id_gov');
    }







}