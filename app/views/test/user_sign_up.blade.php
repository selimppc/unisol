@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
 <h4> Create a New User </h4>

 {{ Form::open(array('url' => 'user/infostore', 'method' =>'post', 'files'=>'true')) }}
     <div> {{  Form::label('title', 'Title: ')  }}
       {{  Form::text('title', '', array('class' => 'form-control', 'required'))  }}
       {{  $errors->first('title', '<div class="alert alert-danger"><b>:message</b></div>')  }}
     </div>

     <div>
       {{  Form::label('body', 'Body: ')  }}
       {{  Form::textarea('body', '', array('class' => 'form-control'))  }}
       {{  $errors->first('body', '<div class="alert alert-danger"><b>:message</b></div>')  }}
     </div>

     <div>
       {{  Form::submit('Save', array('class' => 'btn btn-info'))  }}
     </div>

 {{  Form::close()  }}
<p>&nbsp;</p>
@stop