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
        'email',
        'password',
        'name',
        'status',
        'branch_id',
        'type_id',
        'star_id',
        'location',
        'image',
        'discreption',
    ];

    public function number()
    {
     return $this->hasMany(Number::class);
 
    }
    
    public function wallets()
    {
     return $this->hasMany(Wallet_Office::class,'office_id');
 
    }
    public function stars()
    {
        return $this->belongsTo(Stars::class,'id');
    }
    
    public function type_travel()
    {
        return $this->belongsTo(Type_travel::class);
    }
 
    public function branch()
    {
        return $this->belongsTo(Branch::class,'id','branch_id');
    }
}