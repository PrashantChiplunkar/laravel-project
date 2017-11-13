@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css?'.time())}}">
<script type="text/javascript" src="{{ url('Js/main.js?'.time())}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $data['name']}}</div>

                <div class="panel-body">
                  <ul>
                    <li class="form-control">Name : <span class="name">{{ $data['name']}}</span></li>
                    <li class="form-control">Email : <span class="email">{{ $data['email_id']}}</span></li>
                    <li class="form-control">Gender : {{ $data['gender']}}</li>
                    <li class="form-control">Mobile : {{ $data['mobile']}}</li>
                    <li class="form-control">Adress : {{ $data['address']['street']}} , {{ $data['address']['city']}}, {{ $data['address']['state']}} </li>
                  </ul>
                  
                   <div class="form-group" style="margin-left: 300px;">
                  {!! Form::submit('Update Contact',['class' => 'btn btn-primary update', 'id' => 'btn']) !!}
                  {!! Form::submit('Delete Contact',['class' => 'btn btn-danger delete']) !!}
                  </div>

                  </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div>
<div class="container content">
<div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default update-form" style="display: none;">
                  <div class="panel-heading"><b>{{ $data['name']}}</b> update your Details</div>
                  <div class="panel-body">
                  {!! Form::model($data,['method' => 'POST', 'url' => '/about/'.$data['_id'],'class' => 'form-horizontal']) !!}
                      <div class="form-group">
                      {!! Form::label('name','Name : ',['class' => 'col-md-3 control-label']) !!}
                      {!! Form::text('name',null,['class' => 'form-control', 'style'=>'width:50%;display:inline;', ]) !!}
                      </div>

                      <div class="form-group">
                      {!! Form::label('email','Email : ',['class' => 'col-md-3 control-label']) !!}
                      {!! Form::email('email',$data['email_id'],['class' => 'form-control','disabled','style'=>'width:50%;display:inline;']) !!}
                      </div>

                      <div class="form-group">
                      {!! Form::label('mobile','Mobile No. : ',['class' => 'col-md-3 control-label']) !!}
                      {!! Form::number('mobile',null,['class' => 'form-control', 'style'=>'width:50%;display:inline;']) !!}
                      </div>

                      <div class="form-group">
                      {!! Form::radio('gender','Male','true',['class' => 'form-conrol'])!!}
                      {!! Form::label('male','Male ',['class' => 'col-md-3 control-label']) !!}
                      {!! Form::radio('gender','Female','')!!}
                      {!! Form::label('female','Female') !!}
                      </div>

                      <div class="form-group" style="">
                      {!! Form::label('street','Street :',['class' => 'col-md-3 control-label']) !!}
                      {!! Form::text('street',$data['address']['street'],['class' => 'form-control', 'style'=>'width:20%;display:inline;']) !!}
                      <!-- </div> -->
                      <!-- <div class="form-group" style=""> -->
                      {!! Form::label('city','City :',['class' => '']) !!}
                      {!! Form::select('city',['mumbai' => 'Mumbai','pune' => 'Pune'],strtolower($data['address']['city']),['class' => 'form-control', 'style'=>'width:20%;display:inline;'])!!}
                      <!-- </div> -->

                      <!-- <div class="form-group"> -->
                      {!! Form::label('state','State :',['class' => '']) !!}
                      {!! Form::select('state',['maharashtra' => 'Maharashtra','gujrat' => 'Gujrat','panjab' => 'Punjab','uttarpradesh' => 'Uttarpradesh'],strtolower($data['address']['state']),['class' => 'form-control', 'style'=>'width:20%;display:inline;'])!!}
                      </div>
                      <div class="form-group col-md-5 control-label">
                        {!! Form::submit('Update contact',['class' => 'btn btn-primary', 'id' => 'btn']) !!}
                      </div>
                      
                  {!! Form::close() !!}
                
                </div>
                </div>
                </div>
                </div>
                </div>

@endsection