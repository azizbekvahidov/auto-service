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
            @include('layouts.message')
            <form action="{{route('car.store')}}" method="POST">
            @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="marka" class="form-control" id="marka" placeholder="marka">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="date" name="produce_date" placeholder="produce_date" class="form-control"/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="number" placeholder="number" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="colour" placeholder="colour" class="form-control" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="text" name="class" placeholder="class" class="form-control" />
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
