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
                                <a href="{{route('car.create')}}" class="btn btn-sm btn-primary">Create</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">module</th>
                                    <th scope="col">produce_date</th>
                                    <th scope="col">number</th>
                                    <th scope="col">colour</th>
                                    <th scope="col">class</th>
                                </tr>
                            </thead>
                            @foreach($obj as $i)
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        {{$i->module}}
                                    </th>
                                    <td>
                                        {{$i->produce_date}}
                                    </td>
                                    <td>
                                        {{$i->number}}
                                    </td>
                                    <td>
                                        {{$i->colour}}
                                    </td>
                                    <td>
                                        {{$i->class}}
                                    </td>
                                    <td>
                                        <a href="{{route('car.edit', $i->id)}}" ><i class="fas fa-pen"></i></a>

                                        <a href="{{route('car.delete', $i->id)}}"><i class="fas fa-trash"></i></a>

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
