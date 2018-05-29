
@extends('layouts.app')

@section('content')

    <div id="map_container" data-user="{{\Illuminate\Support\Facades\Auth::user()->id}}" ></div>
    {{--<div class="container">--}}
        {{--<div class="row">--}}


            {{--<div class="col-md-12 col-md-offset-2">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div id="map_container" ></div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection
