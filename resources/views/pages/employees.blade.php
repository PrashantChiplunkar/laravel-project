

@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css?'.time())}}">
<script type="text/javascript" src="{{ url('Js/main.js?'.time())}}"></script>
@foreach($data as $one)
<div class="container" >
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="border: 2px solid #D9D3A4;">
                <div class="panel-heading" style="background: #D9D3A4;">{{ $one['name']}}</div>


                <div class="panel-body">
                  <ul>
                    <li class="form-control">Name : <span class="name">{{ $one['name']}}</span></li>
                    <li class="form-control">Email : <span class="email">{{ $one['email_id']}}</span></li>
                    @if($one['gender']!="")
                    <li class="form-control">Gender : {{ $one['gender']}}</li>@endif
                    @if($one['mobile']!="")
                    <li class="form-control">Mobile : {{ $one['mobile']}}</li>@endif
                    @if($one['address']['street']!="")
                    <li class="form-control">Adress : {{ $one['address']['street']}} , {{ $one['address']['city']}}, {{ $one['address']['state']}} </li>
                    @endif
                  </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection