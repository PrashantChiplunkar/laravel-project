@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css?'.time())}}">
<script type="text/javascript" src="{{ url('Js/main.js?'.time())}}"></script> 

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register yourself</div>
                <div class="panel-body">
                    <div class="form-horizontal">
                    <!-- {!! Form::open(['method' => 'POST','class' => 'registration-form']) !!} -->
                            <div class="form-group">
                                <input type="hidden" value="{!! csrf_token() !!}" name="_token" id="_token" /> 
                                {!! Form::label('name','Name',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::text('name',null,['class' => 'form-control name','placeholder' => 'Full Name*']) !!}
                                <div class="check" id="name-check"></div>
                                <span style="color: red;width: 100px;" id="alert_name"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('email','Email',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::email('email_id',null,['class' => 'form-control email','placeholder' => 'Email*']) !!}
                                <div class="check" id="email-check"></div>
                                 <span style="color: red;width: 100px;" id="alert_email"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','Password',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::password('password',['class' => 'form-control pass','placeholder' => 'password*']) !!}
                                <div class="password-meter" id="password-meter"></div>
                                <span style="color: red;width: 100px;" id="alert_password"></span>
                                </div>
                                 <span style=" width: 100px;" id="alert_pass" class="alert_pass form-control"></span>
                                
                            </div>
                            <div class="form-group">
                                {!! Form::label('confirm_password','Password',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::password('confirm_password',['class' => 'form-control confrm_pass','placeholder' => 'Confirm Password*','disabled']) !!}
                                <div class="password-confirm" id="password-confirm"></div>
                                 <span style="color: red;width: 100px;" id="alert_confrm_pass"></span>
                                </div>
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Register',['class' => 'btn btn-primary','id' => 'register-btn']) !!}
                                <!-- <input type="submit" name="login" value="Login" class="btn btn-primary" id="login-btn"> -->
                                <!-- <a class="btn btn-link" href="">Forgot Your Password?</a> -->
                            </div>
                        </div>
                        <!-- {!! Form::close() !!} -->
                    </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
