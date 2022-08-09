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
            <form action="{{route('service.update', $obj->id)}}" method="POST">
            @csrf
            @method('PUT')
                @php
	                $newDate = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $obj->deatline)->format('d.m.Y H:i');
                @endphp
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value={{$obj->name}}>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="price" value={{$obj->price}} class="form-control"/>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="client_id" value={{$obj->client_id}} class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="car_id" value={{$obj->client_id}} class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="datetime-local" name="deatline" value="{{$newDate}}" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Edit</button>
                </div>

            </form>
        </div>
    </div>
    @include('layouts.footers.auth')

@endsection
