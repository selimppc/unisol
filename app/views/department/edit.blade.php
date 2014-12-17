@section('content')


<div class="span4 well">

       {{--@foreach($department as $data)--}}
        {{Form::open(array('url'=>'department/update/'.$department->id, 'class'=>'form-horizontal'))}}


        {{ Form::label('dept_name','Department Name:') }}
        {{ Form::text('dept_name',$department->title, array('class' => 'form-control')) }}


        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',$department->description, array('class' => 'form-control')) }}

        {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
        {{ Form::submit('Close', array('class'=>'btn btn-primary')) }}

        {{Form::close()}}
        {{--@endforeach--}}
</div>
