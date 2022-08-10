<?php

namespace App\service;

use App\Models\Car;

class CarService{

    public function create($validated){
        return Car::create($validated);
    }
    public function update($validated,$id){
        $car = Car::find($id);
        return $car->update($validated);
    }
    public function delete($id){
        $car = Car::find($id);
        return $car->delete();
    }
}

?>
