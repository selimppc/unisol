{{Form::open(['route'=>'knowledge-base.store', 'files'=>true])}}
        @include('cfo::knowledge_base._form')
{{ Form::close() }}