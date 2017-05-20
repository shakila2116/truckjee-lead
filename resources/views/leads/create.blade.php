@extends('layouts.app')

@section('head')
    <script src="http://maps.googleapis.com/maps/api/js?&libraries=places&key=AIzaSyD0QSm_gWjwbiW5NF6ScuQBUDfJHld-qc8"></script>

@append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Leads -Create
        </div>
        <div class="panel-body" id="lead-form">
            <div class="col-md-6">

                <table v-show="locations.length" class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="col-md-6">Route</th>
                    </tr>
                    </thead>
                    <tr v-for="(location, index) in locations">
                        <td>@{{ location.formatted_address }}</td>
                    </tr>
                </table>
            </div>

            <div class="col-md-6">
        <form  v-on:submit.prevent="create()" >
            <div class="form-group">
                {{--<div class="col-md-6">--}}
                    <input type="text" class="form-control" required placeholder="Name" v-model="form.name">
                {{--</div>--}}
            </div>
            <div class="form-group">
                {{--<div class="col-md-6">--}}
                    <input type="text" class="form-control" required placeholder="Company Name" v-model="form.cmpny_name" >
                {{--</div>--}}
            </div>

            <div class="form-group">
                {{--<div class="col-md-6">--}}
                    <input type="text" class="form-control" required placeholder="Mobile No" v-model="form.phone" >
                {{--</div>--}}
            </div>
            <div class="form-group">
                {{--<div class="col-md-6">--}}
                    <input type="text" class="form-control" required placeholder="Email" v-model="form.email" >
                {{--</div>--}}
            </div>
            <div class="form-group">
                {{--<div class="col-md-6">--}}
                <select type="text" class="form-control" required  v-model="form.truck_type" >
                   <option>Truck type</option>
                    <option value="1">8 wheeler</option>
                    <option value="2">10 wheeler</option>
                    <option value="3">12 wheeler</option>
                </select>
                {{--</div>--}}
            </div>
            <div class="form-group">
                {{--<div class="col-md-6">--}}
                    <select type="text" class="form-control" required v-model="form.type">
                        <option>Type</option>
                        <option value="1"> Broker</option>
                        <option value="2"> Owner</option>
                    </select>
                {{--</div>--}}
            </div>
            <div class="row">
                <div class="form-group col-md-10">
                    {{--<div class="col-md-6">--}}
                    <input type="text" class="form-control" id="location" placeholder="Preferred Route" >
                    <div id="locality_details">
                        <input id="administrative_area_level_1" type="text"
                               hidden>
                        <input id="administrative_area_level_2"
                               type="text"
                               hidden>
                        <input id="locality" type="text" hidden>
                        <input id="formatted_address" type="text" hidden>
                    </div>
                    {{--</div>--}}
               </div>


            </div>

        </form>
                <div class="col-md-2">
                    <button  class="btn btn-success" v-on:click="add">Add</button>
                </div>
                <button class="btn btn-primary" v-on:click="create">Create</button>

            </div>
            </div>
    </div>


@endsection

@section('scripts')
    <script src="{{ url('js/jquery.geocomplete.min.js') }}"></script>

    <script>

        new Vue({
            el: '#lead-form',
            data: {
                form:{
                    name      : '',
                    cmpny_name: '',
                    phone: '',
                    email: '',
                    truck_type: '',
                    type:'',
                },
                route:[],
                locations: [],


            },
            mounted: function () {
                $('#location').geocomplete({
                    country: 'IN',
                    details: "#locality_details",
                    detailsAttribute: 'id'
                });
            },
            methods:{
                add:function () {
                    this.addroute();
                    $('#location').val("");
                },
                addroute:function(){
                    this.locations.push({
                       'formatted_address': $('#formatted_address').val(),
                        'state':$('#administrative_area_level_1').val(),
                        'district':$('#administrative_area_level_2').val(),
                        'locality':$('#locality').val()
                });
                },
                create:function(){
                    axios.post("/leads",{
                        name : this.form.name,
                        cmpny_name:this.form.cmpny_name,
                        phone     :this.form.phone,
                        email     :this.form.email,
                        truck_type:this.form.truck_type,
                        type      :this.form.type,
                        route : this.locations

                    }).then(function(response){
                       console.log(response.data);
                    });
                }
            }
        })



     </script>
@append
