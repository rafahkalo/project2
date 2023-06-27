<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goverments extends Model
{
    use HasFactory;
    protected $table='goverments';
    
    public $timestamps=false;
     
   
    protected $fillable=[
        
        'name',
    ];

    
    public function branch()
    {
     return $this->hasMany(Branch::class);
 
    }
         
}
