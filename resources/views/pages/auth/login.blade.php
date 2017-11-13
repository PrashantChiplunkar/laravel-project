@extends('layouts.app')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ url('css/style.css?'.time())}}">
<script type="text/javascript" src="{{ url('Js/login.js?'.time())}}"></script> 

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <div class="form-horizontal">
                            <div class="form-group">
                            <!-- {!! Form::open() !!} -->
                            <input type="hidden" value="{!! csrf_token() !!}" name="_token" id="_token" /> 
                                {!! Form::label('email','Email',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::email('email_id',null,['class' => 'form-control email','placeholder' => 'Email']) !!}
                                </div>
                                <span style="color: red;" id="alert_email"></span>
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','Password',['class' => 'col-md-3 control-label']) !!}
                                <div class="col-md-6">
                                {!! Form::password('password',['class' => 'form-control pass','placeholder' => 'password']) !!}
                                <p style="float: right;color: red;display: none;" id="check-login">
                                </p>
                                </div>
                                <span style="color: red;" id="alert_password" class="alert_password"></span>
                            </div>

                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                {!! Form::submit('Login',['class' => 'btn btn-primary login-btn','id' => 'login-btn']) !!}
                                <!-- <input type="submit" name="login" value="Login" class="btn btn-primary" class="login-btn"> -->
                                <a class="btn btn-link" href="">Forgot Your Password?</a>
                                <!-- {!! Form::close() !!} -->
                            </div>
                        </div>
                    </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
