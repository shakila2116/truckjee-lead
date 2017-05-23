@extends('layouts.app')

@section('head')

    @append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Report
        </div>
        <div class="panel-body" id="reports">
            <report :truck_type="{{$truck_type}}"></report>
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
