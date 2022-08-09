<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'module',
        'produce_date',
        'number',
        'colour',
        'class'
    ];
    public function client(){
        return $this->belongsTo(Client::class);
    }
}
