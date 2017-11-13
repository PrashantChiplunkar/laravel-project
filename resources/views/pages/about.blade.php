

@extends('layouts.profile')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css?'.time())}}">
<script type="text/javascript" src="{{ url('Js/main.js?'.time())}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #D9D3A4;">Users <span>{!! Form::text('search',null,['class' => 'form-control search','style' => 'float:right;width:500px;height:30px;margin-top:-5px;','placeholder' => 'search']) !!}</span><span style="float: right;position:absolute;margin-left: 87%;color:#A9A9A9;" id="result_count"></span></div>

                <div class="panel-body">
                  <ul class="display-user">
                    @foreach($data as $one)
                      <li>
                          <a href="/contacts/{{ $one['_id']}}">{{ $one['name']}}</a>

                      </li>
                    @endforeach
                  </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection