

{{Form::open(['route'=>'store.help-desk', 'files'=>true])}}

    {{Form::hidden('token_number', $token_number)}}
    {{Form::hidden('status','open')}}
    @include('cfo::onsite_help_desk._form')

{{ Form::close() }}