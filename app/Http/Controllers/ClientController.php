<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Car;
use App\Models\Client;
use App\Models\Client_cars;
use App\service\clientService;
use App\service\ServiceService;
use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $clientService;

    public function __construct(clientService $validate)
    {
        $this->clientService = $validate;
    }

    public function index()
    {
        return view('client.index', [
            'clients' => $this->clientService->getAll()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cars = Car::all();
        return view('client.create', ['cars' => $cars]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $this->clientService->create($request->validated());
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        $services = (new ServiceService)->getAll();
        return view('client.show', [
            'client' => $client,
            'services' => $services
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        $car = Car::all();
        return view('client.update', ['obj' => $client,'car'=>$car]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $this->clientService->update($request->validated(),$id);
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->clientService->delete($id);
        return redirect()->route('client.index');
    }
}
