<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'surename',
        'lastname',
        'birth'
    ];
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
