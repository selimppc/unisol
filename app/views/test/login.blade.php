{{ Form::open(array('url'=>'user/sign', 'class'=>'form-signin')) }}

    <h2 class="form-signin-heading">Please Login</h2>

    {{ Form::text('username', null, array('class'=>'input-block-level', 'placeholder'=>'username')) }}
    {{ Form::password('password', null, array('class'=>'input-block-level', 'placeholder'=>'Password')) }}

    {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary btn-block'))}}

{{ Form::close() }}

