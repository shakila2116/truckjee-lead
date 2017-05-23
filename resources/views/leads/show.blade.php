@extends('layouts.app')

@section('head')

    @append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Leads
        </div>
        <div class="panel-body" id="lead-show">
            <lead-show :id="{{ $id }}" :truck_type="{{$truck_type}}"></lead-show>
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
