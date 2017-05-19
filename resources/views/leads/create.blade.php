@extends('layouts.app')

@section('head')
    <script src="http://maps.googleapis.com/maps/api/js?&libraries=places&key=AIzaSyD0QSm_gWjwbiW5NF6ScuQBUDfJHld-qc8"></script>

@append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Leads -Create
        </div>
        <div class="panel-body">
            <div id="app">
                {{ message }}
            </div>


            <div class="col-md-6" id="leads">
                <ul class="list-group col-md-offset-5">
                    <li class="list-group-item">Name : </li>
                    <li class="list-group-item">Phone : </li>
                    <li class="list-group-item">Email : </li>
                    {{--<li class="list-group-item">Locality :</li>--}}

                </ul>
            </div>
        </div>
        {{--<div class="panel-body">--}}
            {{--<form class="form-horizontal" method="post" action="{{url('/leads')}}">--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="text" class="form-control col-md-offset-5" required placeholder="Name">--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="text" class="form-control col-md-offset-5" required placeholder="Company Name" name="cmpny_name" >--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="text" class="form-control col-md-offset-5" required placeholder="Mobile No" name="phone" >--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="text" class="form-control col-md-offset-5" required placeholder="Email" name="name" >--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<select type="text" class="form-control col-md-offset-5" required>--}}
                            {{--<option></option>--}}
                            {{--<option value="1"> Broker</option>--}}
                            {{--<option value="2"> Owner</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<div class="col-md-6">--}}
                        {{--<input type="text" class="form-control" id="location" name=location placeholder="Location">--}}
                        {{--<div id="locality_details">--}}
                            {{--<input id="administrative_area_level_1" type="text"--}}
                                   {{--hidden>--}}
                            {{--<input id="administrative_area_level_2"--}}
                                   {{--type="text"--}}
                                   {{--hidden>--}}
                            {{--<input id="locality" type="text" hidden>--}}
                            {{--<input id="formatted_address" type="text" hidden>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}

                {{--<button class="btn btn-primary col-md-offset-3" type="submit">Create</button>--}}
            {{--</form>--}}

        {{--</div>--}}
    </div>


@endsection

@section('scripts')
    <script src="{{ url('js/jquery.geocomplete.min.js') }}"></script>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                message: 'Hello Vue!'
            }
        })

//         new Vue({
//             el: '#leads',
//             data: {
//                 name:"helo",
//                 state: '',
//                 district: '',
//                 locality: '',
//                 formatted_address: '',
//             },
//             mounted: function () {
//                 $('#location').geocomplete({
//                     country: 'IN',
//                     details: "#locality_details",
//                     detailsAttribute: 'id'
//                 });
//             },
//         })

     </script>
@append
