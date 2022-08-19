@extends("layouts.app")

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Client</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('client.create')}}" class="btn btn-sm btn-primary">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">name</th>
                                    <th scope="col">surename</th>
                                    <th scope="col">lastname</th>
                                    <th scope="col">birth</th>
                                    <th></th>
                                </tr>
                            </thead>

                        @foreach ($clients as $client)
                            <tbody>
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <th scope="row">
                                        <a href="{{route('client.show', $client->id)}}">
                                            {{$client->name}}
                                        </a>
                                    </th>
                                    <td>
                                        {{$client->surename}}
                                    </td>
                                    <td>
                                        {{$client->lastname}}
                                    </td>
                                    <td>
                                        {{$client->birth}}
                                    </td>
                                    <td>
                                        <a href="{{route('client.edit',$client->id)}}" ><i class="fas fa-pen"></i></a>

                                        <a href="{{route('client.delete',$client->id)}}"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
