<div style="padding: 10px; width: 90%;">

 <h1>Show Degree Level</h1>

    {{ Form::open(array('url'=>'degree_level/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2>{{ $degree->title }}</h2>
            <p>
                <strong> Description:</strong> {{ $degree->description }}
            </p>
        </div>

    <a href="{{URL::to('degree_level/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
