<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class External_Travel extends Model
{
    use HasFactory;
    public $timestamps=false;
     
  
    protected $fillable=['office_id','driver_id','time_paid','status','cost','destnation','time','date'];

    public function office()
    {
        return $this->belongsTo(Office::class,'id');
    }
}
