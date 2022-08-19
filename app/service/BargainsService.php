<?php

namespace App\service;

use App\Models\Bargain;
use App\Models\BargainService;

class BargainsService{

    public function save($validated){
        $bargain = new Bargain;
        $bargain->client_id = $validated->client_id;
        $bargain->car_id = $validated->car_id;
        $bargain->total_price = $validated->total_price;
        $bargain->date = date('Y-m-d');

        $bargain->save();

        foreach($validated->services_id as $key => $id){
            $bargain_service = new BargainService;
            $bargain_service->bargain_id = $bargain->id;
            $bargain_service->service_id = $id;
            $bargain_service->price = $validated->price[$key];
            $bargain_service->save();
        }
    }
}
?>
