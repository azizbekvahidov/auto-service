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
                                <h3 class="mb-0">Service</h3>
                            </div>
                            <div class="col text-right">
                                <a href="{{route('service.create')}}" class="btn btn-sm btn-primary">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">name</th>
                                    <th scope="col">price</th>
                                    <th scope="col">client_id</th>
                                    <th scope="col">car_id</th>
                                    <th scope="col">deatline</th>

                                </tr>
                            </thead>

                            @foreach($obj as $i)
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        {{$i->name}}
                                    </th>
                                    <td>
                                        {{$i->price}}
                                    </td>
                                    <td>
                                        {{$i->client->name}}
                                    </td>
                                    <td>
                                        {{-- {{$i->car->module}} --}}
                                    </td>
                                    <td>
                                        {{$i->deatline}}
                                    </td>
                                    <td>
                                        <a href="{{route('service.edit', $i->id)}}" ><i class="fas fa-pen"></i></a>

                                        <a href="{{route('service.delete', $i->id)}}"><i class="fas fa-trash"></i></a>

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
