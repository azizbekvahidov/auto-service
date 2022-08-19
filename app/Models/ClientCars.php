<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCars extends Model
{
    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function car() {
        return $this->belongsTo(Car::class);
    }
    public function services() {
        return $this->belongsToMany(Service::class, 'bargains', 'client_car_id', 'service_id');
    }
}
