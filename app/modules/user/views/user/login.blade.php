@extends('layouts.login')

@section('content')

    <div class="inner-wrapper" id="login-box">
        <div class="header">Edu Tech Solutions</div>
        {{ Form::open(array('url'=>'user/login', 'class'=>'form-signin')) }}
            <div>
                <div class="form-group">
                    {{  $errors->first('username', '<div class="alert alert-danger"><b>:message</b></div>')  }}
                    {{Form::text('username', null, ['class'=>'form-control', 'placeholder'=>'Username', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{  $errors->first('password', '<div class="alert alert-danger"><b>:message</b></div>')  }}
                    {{Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>'required'])}}
                </div>
                <div class="form-group">
                    {{Form::checkbox('remember_me', null)}}
                    {{Form::label('remember_me', 'Remember Me')}}
                </div>
            </div>
            <div>
                <button type="submit" class="btn">Sign me in</button>
                <a href="#">Forgot Password ?</a>

            </div>
        {{ Form::close() }}


    </div>


@stop
