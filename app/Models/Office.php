<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $table='offices';
    
    public $timestamps=false;
     
  
    protected $fillable=[
        
        'name',
        'status',
        'id_branch',
        'id_type',
        'id_star',
        'location',
        'image',
        'discreption',
    ];

    public function number()
    {
     return $this->hasMany(Number::class);
 
    }
    
    public function stars()
    {
        return $this->belongsTo(Stars::class);
    }
    
    public function type_travel()
    {
        return $this->belongsTo(Type_travel::class);
    }
 
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}

