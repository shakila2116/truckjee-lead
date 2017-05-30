@extends('layouts.app')

@section('head')

@append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Leads
        </div>
        <div class="panel-body">
            <div class="col-md-6">
                <form method="post" action="{{url("/leads")}}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="text" class="form-control" required placeholder="Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" required placeholder="Company Name" name="cmpny_name" >
                    </div>
                    <div class="form-group {{$errors->has('phone' ? "has-error":" ")}}">
                        <input type="number" class="form-control" required placeholder="Mobile No" name="phone">
                        @if($errors->has("phone"))
                            <span style="color: red;">{{ $errors->first("phone") }}</span>
                        @endif
                    </div>

                    <div class="form-group {{$errors->has('email' ? "has-error": "")}}">
                        <input type="email" class="form-control" required placeholder="Email" name="email">
                        @if($errors->has("email"))
                                <span style="color:red">{{ $errors->first("email") }}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="location" placeholder="Source Address" required>
                        <div id="locality_details">
                            <input id="administrative_area_level_1" type="text" name="state"
                                   hidden>
                            <input id="administrative_area_level_2"
                                   type="text" id="district"
                                   hidden>
                            <input id="locality" type="text" name="locality" hidden>
                            <input id="formatted_address" type="text" name="formatted_address" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <select type="text" class="form-control" required name="type">
                            <option value="" disabled selected>Select Role</option>
                            <option value="1"> Broker</option>
                            <option value="2"> Owner</option>
                        </select>
                    </div>

                    <button class="btn btn-primary" id="create">Create</button>

                </form>

            </div>

            {{--<lead></lead>--}}
        </div>
    </div>


@endsection

@section('scripts')
<script>
    $('#location').geocomplete({
        country: 'IN',
        details: "#locality_details",
        detailsAttribute: 'id'
    });
</script>
@append
