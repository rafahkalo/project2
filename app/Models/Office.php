<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
//use Illuminate\Foundation\Auth\Office as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Office extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
=======

class Office extends Model
{
    use HasFactory;
>>>>>>> 56a234b2000b2235402f92a9f8949f53699211b0
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
<<<<<<< HEAD


        'phoneOne',
        'phoneTwo',
        'contract',

=======
        'phoneOne',
        'phoneTwo',
        'contract',
>>>>>>> 56a234b2000b2235402f92a9f8949f53699211b0
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
<<<<<<< HEAD
<<<<<<< HEAD
=======

    public function external__travels()
    {
        return $this->hasMany(External_Travel::class,'office_id');
    }
>>>>>>> 38fac941b19a62499b1fe823b56acd1d48d0e5f8
=======
>>>>>>> 56a234b2000b2235402f92a9f8949f53699211b0
}