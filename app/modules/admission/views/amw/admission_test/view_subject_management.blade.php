<div style="padding: 5px; width: 90%;">
             <h2>Welcome to View Subject Management <strong></strong> </h2> </br>
             {{ Form::open(array('route'=>'admission_test.amw.view_subject_management','method' => '')) }}
                     <div class="jumbotron text-center">

                             <h4><strong> Title: </strong> {{ $view_subject_management->title }}  </h4></br>
                             <h4><strong> Description: </strong>{{ $view_subject_management->description }} </h4> </br>

                     </div>

                     <a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close </a>
                     {{--{{ Form::submit('Comments', array('class' => 'btn btn-primary btn-xs')) }}--}}
             {{ Form::close() }}

</div>