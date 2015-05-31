<div style="padding: 10px; width: 90%;">

 <h1>Show Semester</h1>

    {{ Form::open(array('url'=>'target_role/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{  $targetRole->title }}</h2>
            <p>
                <strong> Code:</strong> {{ $targetRole->code }}
                <br>
                <strong> Description:</strong> {{ $targetRole->description }}
            </p>
        </div>

        <a href="{{URL::to('target_role/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
