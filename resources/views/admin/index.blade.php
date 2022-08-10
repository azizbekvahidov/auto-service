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
                                <h3 class="mb-0">Admin</h3>
                            </div>
                            <div class="col text-right">
                                <a href="" class="btn btn-sm btn-primary">Add Client</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Client</th>
                                    <th scope="col">car</th>
                                    <th scope="col">Service</th>
                                    <th scope="col">price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($client as $i)
                                    <tr>

                                        <th scope="row">
                                            {{$i->name}}
                                            {{$i->surename}}
                                        </th>

                                        <th>

                                        </th>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
