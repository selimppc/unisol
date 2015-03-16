<div style="padding: 20px;">
        <h3>Edit {{$department->title}}</h3>
       {{--@foreach($department as $data)--}}
        {{Form::open(array('url'=>'department/update/'.$department->id, 'class'=>'form-horizontal'))}}


        {{ Form::label('dept_name','Department Name:') }}
        {{ Form::text('dept_name',$department->title, array('class' => 'form-control')) }}


        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',$department->description, array('class' => 'form-control')) }}
        <p>&nbsp;</p>
        {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
         <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}

</div>
