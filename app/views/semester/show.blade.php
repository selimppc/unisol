<div style="padding: 10px; width: 90%;">

 <h1>Show Semester</h1>

    {{ Form::open(array('url'=>'semester/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{ $term_semester->title }}</h2>
            <p>
                <strong> Description:</strong> {{ $term_semester->description }}
            </p>
        </div>

    <a href="{{URL::to('semester/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
