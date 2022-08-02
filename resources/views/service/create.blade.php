@extends("layouts.app")

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>

    <div class="card" style="width: 50%;">
        <div class="card-body">
            <form action="{{route('service.store')}}" method="POST">
            @csrf
            @method('PUT')
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="price" placeholder="price" class="form-control"/>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="client_id" placeholder="client_id" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="datetime-local" name="deatline" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">create</button>
                </div>
            </form>
        </div>
    </div>
    @include('layouts.footers.auth')

@endsection
