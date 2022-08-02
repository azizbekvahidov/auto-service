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
                                <h3 class="mb-0">Page visits</h3>
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
                                    <th scope="col">name</th>
                                    <th scope="col">surename</th>
                                    <th scope="col">lastname</th>
                                    <th scope="col">birth</th>
                                    {{-- <th scope="col">passport</th> --}}
                                </tr>
                            </thead>

                        @foreach ($obj as $i)


                            <tbody>
                                <tr>
                                    <th scope="row">
                                        {{$i->name}}
                                    </th>
                                    <td>
                                        {{$i->surename}}
                                    </td>
                                    <td>
                                        {{$i->lastname}}
                                    </td>
                                    <td>
                                        {{$i->birth}}
                                    </td>
                                    <td>
                                        {{$i->passport}}
                                    </td>
                                    <td>
                                        <a href="{{route('client.edit',$i->id)}}" ><i class="fas fa-pen"></i></a>

                                        <a href="{{route('client.delete',$i->id)}}"><i class="fas fa-trash"></i></a>

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
