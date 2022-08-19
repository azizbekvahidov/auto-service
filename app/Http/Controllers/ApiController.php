<?php

namespace App\Http\Controllers;

use App\Http\Requests\BargainSaveRequest;
use App\Models\Bargain;
use App\Models\Car;
use App\Models\Client;
use App\Models\Service;
use App\service\ServiceService;
use App\service\BargainService;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function cars($id) {
        $client = Client::query()->find($id);
        $cars = $client->cars;
        return response($cars);
    }

    public function show_service(){
        $service = new ServiceService;
        return response($service->getAll());
    }

    public function service($id) {
        $service = Service::find($id);
        return response($service);
    }


    public function report($id) {
        $bargain = Bargain::where('date', '=', $id)->get();
        foreach ($bargain as $details) {
            $details->client;
            $details->car;
        }
        return response($bargain);
    }
    public function bargain_service($id) {
        $bargain_service = Bargain::query()->find($id);
        $services = $bargain_service->bargain_service;
        foreach($services as $service){
            $service->service;
        }
        return response($services);
    }
}

