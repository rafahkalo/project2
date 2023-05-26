<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stars extends Model
{
    use HasFactory;
    protected $table='stars';

    public $timestamps=false;


    protected $fillable=[

        'name',
        'number'
    ];



    public function office()
    {
     return $this->hasMany(Office::class);

    }
}
