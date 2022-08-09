<?php

namespace App\service;

use App\Models\Service;

class ServiceService{

    public function create($validated){
        return Service::create($validated);
    }
    public function update($validated,$id){
        $service = Service::find($id);
        return $service->update($validated);
    }
    public function delete($id){
        $service = Service::find($id);
        return $service->delete();
    }
}

?>
