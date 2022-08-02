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
            <form action="{{route('car.update',$obj->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="module" value={{$obj->module}} class="form-control" id="exampleFormControlInput1" placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="datetime-local" name="produce_date" value={{$obj->produce_date}} placeholder="surename" class="form-control"/>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <input type="number" name="number" value={{$obj->number}} placeholder="lastname" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="colour" value={{$obj->colour}} placeholder="birth" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="class" value={{$obj->class}} class="form-control" />
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
