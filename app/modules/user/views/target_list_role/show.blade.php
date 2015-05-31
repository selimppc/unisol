<div style="padding: 10px; width: 90%;">

 <h1>Show Semester</h1>

    {{ Form::open(array('url'=>'target_list_role/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{  $taskListRole->title }}</h2>
            <p>
                <strong> Description:</strong> {{ $taskListRole->description }}
            </p>
        </div>

        <a href="{{URL::to('target_list_role/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
