

        <div style="padding: 10px; width: 90%;">
         <h1>Create Degree Level</h1>

            {{ Form::open(array('route' => 'degreelevel.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('degree_level._form')

            {{ Form::close() }}

        </div>

