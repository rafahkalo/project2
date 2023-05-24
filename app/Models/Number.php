<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    use HasFactory;
    protected $table='numbers';
    
    public $timestamps=false;
     
   
    protected $fillable=[
        
        'id_office',
        'phone',

    ];
    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
