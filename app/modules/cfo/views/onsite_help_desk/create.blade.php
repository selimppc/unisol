

{{Form::open(['route'=>'store.help-desk', 'files'=>true])}}

    {{Form::hidden('token_number',$token_number +1)}}
    @include('cfo::onsite_help_desk._form')

{{ Form::close() }}