@extends("layouts.app")

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>

    <div class="card-body d-flex justify-content-around w-100 bg-white">
        <input type="date" class="date_bargain form-control w-50">
        <button class="get_date btn btn-success ">Get</button>
    </div>

    <div class="table-responsive">
        <table class="table table-white align-items-center ">
            <thead class="">
                <tr>
                    <th scope="col">№</th>
                    <th scope="col">Client</th>
                    <th scope="col">Car</th>
                    <th scope="col">Total price</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody class="show_bargain"></tbody>
        </table>
    </div>

    <div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <table class='table-striped table-white w-100'>
                    <thead>
                        <tr>
                            <th>service</th>
                            <th>price</th>
                        </tr>
                    </thead>
                    <tbody class='services'>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@include('layouts.footers.auth')
@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('.get_date').click(function () {
                let date = $('.date_bargain').val()
                $('.list').remove()
                $.ajax({
                    type: "GET",
                    url: "api/report/"+date,
                    success: function (response) {
                        for(let i=0; i<response.length; i++){
                            let client = response[i].client.name;
                            let car = response[i].car.marka;
                            let total_price = response[i].total_price;
                            let show_bargain = "<tr class='list'><th class = 'bargain_id' >"+response[i].id+"</th><th>"+client+"</th><th>"+car+"</th><th>"+total_price+"</th><th><button class='show_details btn btn'  data-toggle='modal' data-target='.bd-example-modal-lg'>show details</button></th></tr>"
                            $('.show_bargain').append(show_bargain)
                        }
                    }
                });
            });

            $(document).on("click",'.show_details',function () {
                let bargain_id = $(this).parents().children('.bargain_id').text()
                $('.service_remove').remove()
                $.ajax({
                    type: "GET",
                    url: "api/bargain_service/"+bargain_id,
                    success: function (response) {
                        for(let i=0; i<response.length; i++){
                            let service = response[i].service.name;
                            let price = response[i].price;
                            let all_service= "<tr class='service_remove'><td>"+service+"</td><td>"+price+"</td></tr>"
                            $('.services').append(all_service);
                        }
                        $('.modal').modal('show');
                    }
                })
            })

    })
    </script>
@endsection
