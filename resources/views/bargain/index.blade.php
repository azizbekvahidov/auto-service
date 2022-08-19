@extends("layouts.app")

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
            </div>
        </div>
    </div>
    <form action="{{route('bargain.store')}}" method="POST">
        @csrf
        <div class="card-body w-100 bg-white">
            <div class="">
                <h2 class="mb-0">Bargain</h2>
            </div>
            <div class="form-group">
                <select name="client_id" class="select2 w-100" id='clients' data-placeholder="select client" >
                    <option value=""></option>
                    @foreach ($clients as $client)
                        <option value="{{$client->id}}" >{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="car_id" class="select2 w-100" id='cars' data-placeholder="select cars" >
                    <option value=""></option>
                </select>
            </div>
        </div>

        <div class="card-body bg-white">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="mb">Services</h2>
                    <h4>Total price: <input type="hidden" id="total_price_input" name='total_price' value="0"><span id='total_price'>0</span></h4>
                </div>
                <div>
                    <button type="button"  class='add_service btn btn-success'>Add service</button>
                </div>
            </div>
            <div class='addService select form-group'>

            </div>
            <input type="submit" class="save btn btn-success" value="Save">
        </div>
    </form>


@include('layouts.footers.auth')
@endsection
@section('script')
<script>
    $(function(){
        $(".select2").select2()
    })
    $(document).ready(function(){
        $('#clients').change(function () {
            $('.option_remove').remove();
            let client = $(this).val();

            $.ajax({
                url: "api/cars/" + client,
                type: "GET",
                success:function(responce){
                    for(let i=0; i<responce.length; i++){
                        let car_marka = responce[i].marka;
                        let car_id = responce[i].id;

                        let option = "<option value="+car_id+" class='option_remove'>"+car_marka+"</option>";
                        $("#cars").append(option);

                    }
                }

            })
        });

        $('.add_service').click(function () {
            let option
            $.ajax({
                url: "api/services",
                type: "GET",
                success:function(responce){
                    for(let i=0; i<responce.length; i++){
                        let service_name = responce[i].name;
                        let service_id = responce[i].id;

                        option += "<option value="+service_id+" class='option_remove'>"+service_name+"</option>";
                    }
                    let select = "<div><select name='services_id[]' class='select2 services w-100'  data-placeholder='select service' ><option value=''></option>"+option+"</select><h4>price: <input type='hidden' class='input_price' name='price[]' value=''><span class='price'>0</span></h4><i class='delete_service fas fa-trash'></i></div>"

                    $(".addService").append(select);
                    $(".select2").select2();
                }
            })
        });

        $(document).on("change",".services",function () {
                        let service = $(this).val();
                        var price_el = $(this).parent().children("h4").children(".price");
                        var input_price = $(this).parent().children("h4").children(".input_price");

                        let total_price = +$('#total_price').html();
                        $.ajax({
                            url: "api/services/" + service,
                            type: "GET",
                            success:function(responce){
                                price_el.html(responce.price);
                                input_price.val(responce.price);

                                total_price += +responce.price;
                                $('#total_price').html(total_price);
                                $('#total_price_input').val(total_price)
                            }
                        })
        })
        $(document).on("click",".delete_service",function () {
            $(this).parent().remove();
        })

})
</script>
@endsection
