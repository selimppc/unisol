@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
    <h1>Drop down</h1>
    {{ Form::open(array('url'=>'dropdown/data', 'class'=>'form-signin')) }}

        {{ Form::select('username', ['Select user'] + User::lists('username','id'), Input::old(''), ['id'=>'username', 'class'=>'form-control'] )}}
        <br>
        <select id="some-thing" name="some_thing" class="form-control">
            <option>Please choose one</option>
        </select>

    {{ Form::close() }}



<script>
$('#username').change(function(){
    $.get("{{ url('dropdown/data')}}",
        { option: $(this).val() },
        function(data) {
             var model = $('#some-thing');
             model.empty();
            $.each(data, function(key, element) {
                model.append("<option value='"+ key +"'>" + element + "</option>");
            });
        });
});
</script>

@stop

