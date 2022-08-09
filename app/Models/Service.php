<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\Node\FunctionNode;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "price",
        "client_id",
        "car_id",
        "deatline"
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
