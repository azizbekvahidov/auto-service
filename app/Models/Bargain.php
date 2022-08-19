<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bargain extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'car_id',
        'total_price'
    ];
    public function client(){
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    public function car(){
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
    public function bargain_service(){
        return $this->hasMany(BargainService::class);
    }

}
