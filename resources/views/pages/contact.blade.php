@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css?'.time())}}">
<script type="text/javascript" src="{{ url('Js/main.js?'.time())}}"></script>
<script type="text/javascript" src="{{ url('Js/contact.js?'.time())}}"></script>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: #D9D3A4;">Contact Us</div>
                <div class="panel-body" id="status" style="display: none;text-align: center;background: #DCDCDC;width: 90%;margin: auto;">
                  <h2 style="color: green;">Response successfully stored !!!!</h2>
                </div>
                
                <div class="panel-body">
                <div class="form-horizontal" >
                  <!-- {!! Form::open(['url' => '/contacts','class' => 'form-horizontal']) !!} -->
                  <form id="myform">
                    
                  
                      <div class="form-group" >
                          <input type="hidden" value="{!! csrf_token() !!}" name="_token" id="_token" /> 
                            {!! Form::label('name','Name : ',['class' => 'col-md-2 control-label']) !!}
                            <div class="col-md-6">
                            {!! Form::text('name',null,['class' => 'form-control name','placeholder' => 'Full Name*']) !!}
                            <div class="check" id="name-check"></div>
                            </div>
                            <span style="color: red;width: 100px;" id="alert_name"></span>
                            </div>

                      <div class="form-group">
                      {!! Form::label('email','Email : ',['class' => 'col-md-2 control-label']) !!}
                      <div class="col-md-6">
                      {!! Form::email('email',null,['class' => 'form-control email','placeholder' => 'Email']) !!}
                      <div class="check" id="email-check"></div>
                      </div>
                      <span style="color: red;width: 100px;" id="alert_email"></span>
                      </div>

                      <div class="form-group">
                      {!! Form::label('mobile','Mobile No. : ',['class' => 'col-md-2 control-label']) !!}
                      <div class="col-md-6">
                      {!! Form::number('mobile','',['class' => 'form-control mobile', 'style'=>'width:50%;display:inline;','placeholder' => 'Mobile No.']) !!}
                      <div class="check" id="mobile-check"></div>
                      <span style="color: red;width: 100px;" id="alert_mobile"></span>
                      </div>
                     
                      </div>

                      <div class="form-group">
                      <!-- {!! Form::radio('gender','Male','true')!!}
                      {!! Form::label('male','Male ',['class' => 'col-md-3 control-label']) !!}
                      {!! Form::radio('gender','Female','')!!}
                      {!! Form::label('female','Female') !!} -->
                      {!! Form::label('gender','Gender :',['class' => 'col-md-2 control-label']) !!}
                      <div class="col-md-6">
                      {!! Form::select('gender',['select' => 'Select Gender','male' => 'Male','female' => 'Female'],'select',['class' => 'form-control gender', 'style'=>'width:50%;display:inline;'])!!}
                      <div class="check" id="gender-check"></div>
                      <span style="color: red;width: 100px;" id="alert_gender"></span>
                      </div>
                      
                      </div>

                      <div class="form-group">
                      {!! Form::label('street','Street :',['class' => 'col-md-2 control-label']) !!}
                      <div class="col-md-6">
                      {!! Form::text('street',null,['class' => 'form-control street', 'style'=>'width:50%;display:inline;','placeholder' => 'Street Name']) !!}
                      <div class="check" id="street-check"></div>
                      <span style="color: red;width: 100px;" id="alert_street"></span>
                      </div>
                      
                      </div>

                      <div class="form-group">
                      {!! Form::label('city','City :',['class' => 'col-md-2 control-label']) !!}
                      <div class="col-md-6">
                      {!! Form::select('city',['select' => 'Select City','mumbai' => 'Mumbai','pune' => 'Pune'],'select',['class' => 'form-control city', 'style'=>'width:50%;display:inline;'])!!}
                      <div class="check" id="city-check"></div>
                      <span style="color: red;width: 100px;" id="alert_city"></span>
                      </div>
                      
                      </div>
                      <div class="form-group">
                      {!! Form::label('state','State :',['class' => 'col-md-2 control-label']) !!}
                      <div class="col-md-6">
                      {!! Form::select('state',['select' => 'Select State','maharashtra' => 'Maharashtra','gujrat' => 'Gujrat','panjab' => 'Punjab','uttarpradesh' => 'Uttarpradesh'],'select',['class' => 'form-control state', 'style'=>'width:50%;display:inline;'])!!}
                       <div class="check" id="state-check"></div>
                       <span style="color: red;width: 100px;" id="alert_state"></span>
                      </div>
                      
                      </div>
                      {!! Form::submit('Add contact',['class' => 'btn btn-primary col-md-3 ','style'=> 'margin-left:25%;margin-top:10px;', 'id' => 'contact-btn']) !!}
                      </form>
                  <!-- {!! Form::close() !!} -->
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

@endsection

