<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Car;
use App\Models\Client;
use App\Models\Client_cars;
use App\service\ClientService;
use Illuminate\Http\Request;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $clientservice;

    public function __construct(ClientService $validate)
    {
        $this->clientservice = $validate;
    }

    public function index()
    {
        $client = Client::all();
        return view('client.index', ['obj' => $client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = Car::all();
        return view('client.create', ['obj' => $car]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $this->clientservice->create($request->validated());
        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->clientservice->update($request->validated(),$id);
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
        $this->clientservice->delete($id);
        return redirect()->route('client.index');
    }
}
