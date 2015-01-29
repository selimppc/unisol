@extends('layouts.login')

@section('content')

    <div class="inner-wrapper" id="login-box">
        <div class="header">Edu Tech Solutions</div>
        <form action="#" method="post">
            <div>
                <div class="form-group">
                    {{  $errors->first('email_address', '<div class="alert alert-danger"><b>:message</b></div>')  }}
                    {{Form::email('email_address', null, ['class'=>'form-control', 'placeholder'=>'Email Address', 'required'=>'required'])}}
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
                <a href="#">Forgot Password?</a>

            </div>
        </form>


    </div>


@stop
