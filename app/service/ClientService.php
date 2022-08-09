<?php

namespace App\service;

use App\Models\Client;
use App\Models\Client_cars;
use App\Models\ClientCars;

class ClientService{

    public function create($validate){
        $client = Client::create($validate);
        foreach($validate["car_id"] as $id){
            $clientCar = new ClientCars();
            $clientCar->client_id = $client->id;
            $clientCar->car_id = $id;
            $clientCar->save();
        }
        return $client;
    }
    public function update($validate,$id){
        $client = Client::find($id);
        return $client->update($validate);
    }
    public function delete($id){
        $client = Client::find($id);
        return $client->delete();
    }
}

?>
