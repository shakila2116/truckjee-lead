@extends('layouts.app')

@section('head')

    @append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Leads -Index
        </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                    <table class="table table-bordered" id="table">
                        <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-2">Name</th>
                            <th class="col-md-2">Details</th>
                            <th class="col-md-2">Source</th>
                            <th class="col-md-2">preferred Route</th>
                            <th class="col-md-1">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr>
                                <td>{{$lead->id}}</td>
                                <td>{{$lead->name}} -<b>{{ $lead->type($lead->type) }}</b></td>
                                <td> Company: <b>{{$lead->company_name }}</b><br/>
                                    Phone: <b>{{ $lead->phone }}</b><br/>
                                    Email: <b>{{ $lead->email }}</b>
                                </td>
                                <td>{{$lead->location($lead->lead_location_id)}}</td>
                                <td>
                                    <ul>
                                        @foreach($lead->route as $val)
                                            <li>{{$val->location->formatted_address}} </li>
                                        @endforeach
                                    </ul>

                                </td>
                                <td><a href="/leads/{{$lead->id}}" class="btn btn-xs btn-warning">Add Route</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>


    @endsection

@section('scripts')
    <script>
        $('#table').dataTable({
            responsive: true
        });
    </script>

    @append
