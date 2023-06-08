<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet_Office extends Model
{
    use HasFactory;
    protected $table='wallet__offices';

    protected $fillable = ['amount','code','office_id'];

    public function office()
    {
     return $this->belongsTo(Office::class,'office_id');
 
    }
}