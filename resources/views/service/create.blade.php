@extends("layouts.app")

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            @include('layouts.message')
            <form action="{{route('service.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="number" name="price" placeholder="price" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="date" name="deadline" class="form-control" />
                </div>
                <button type="submit" class="btn btn-success">create</button>
            </form>
        </div>
    </div>
    @include('layouts.footers.auth')

@endsection
