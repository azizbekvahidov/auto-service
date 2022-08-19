<?php

namespace App\service;

use App\Models\Client;

class ClientService{

    public function getAll() {
        return Client::all();
    }

    public function create($validate){
        $client = Client::create($validate);
        $client->cars()->sync($validate['car_id']);
        return $client;
    }
    public function update($validate,$id){
        $client = Client::find($id);
        $client->update($validate);
        $client->fresh();
        $client->cars()->sync($validate['car_id']);
        return $client;
    }
    public function delete($id){
        $client = Client::find($id);
        return $client->delete();
    }
}

?>
