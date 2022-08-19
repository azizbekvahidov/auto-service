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
            <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @error('car_id')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @method('PUT')
                <div class="form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="name">
                </div>
                <div class="form-group">
                    <input type="text" name="surename" placeholder="surename" class="form-control"/>
                </div>
                <div class="form-group">
                    <input type="text" name="lastname" placeholder="lastname" class="form-control" />
                </div>
                <div class="form-group">
                    <input type="date" name="birth" placeholder="birth" class="form-control" />
                </div>
                <div class="form-group">
                    <select name="car_id[]" class="select2 w-100" data-placeholder="Выберите тачку" multiple>
                        <option value=""></option>
                        @foreach ($cars as $car)
                                <option value="{{$car->id}}">{{$car->marka}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">create</button>
            </form>
        </div>
    </div>
    @include('layouts.footers.auth')
@endsection
@section('script')
<script>
    $(function() {
        $('.select2').select2();
    });
</script>
@endsection
