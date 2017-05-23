@extends('layouts.app')

@section('head')

@append

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            Leads
        </div>
        <div class="panel-body">

            <lead></lead>
            {{--<div class="panel-danger">--}}
                {{--@if (isset($errors) && $errors->has(''))--}}
                    {{--@foreach ($errors->all() as $error)--}}
                        {{--<div>{{ $error }}</div>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</div>--}}
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
