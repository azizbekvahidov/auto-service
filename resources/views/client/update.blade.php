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
            <form action="{{route('client.update',$obj->id)}}" method="POST">
            @csrf
            @method('PUT')
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="name" value={{$obj->name}} class="form-control" id="exampleFormControlInput1" placeholder="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="surename" value={{$obj->surename}} placeholder="surename" class="form-control"/>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="lastname" value={{$obj->lastname}} placeholder="lastname" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="datetime-local" name="birth" value={{$obj->birth}} placeholder="birth" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <select name="car_id[]" multiple>
                        @foreach ($car as $i)
                                <option value="{{$i->id}}">{{$i->module}}</option>
                        @endforeach
                            </select>
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
