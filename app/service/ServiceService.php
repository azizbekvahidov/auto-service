<?php

namespace App\service;

use App\Models\Service;

class ServiceService{

    public function getAll() {
        return Service::all();
    }

    public function create($validated){
        return Service::create($validated);
    }

    public function update($validated, Service $service){
        $service->update($validated);
        $service->fresh();

        return $service;
    }

    public function delete(Service $service){
        return $service->delete();
    }
}

?>
