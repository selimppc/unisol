<div style="padding: 5px; width: 90%;">

             <h2>Welcome to View Degree Management <strong></strong> </h2> </br>
             {{ Form::open(array('route'=>'admission_test.amw.view_degree_management','method' => '')) }}
                     <div class="jumbotron text-center">

                            <strong> Title: </strong> {{ $view_degree_management->title }} </br>

                            <strong> Description: </strong>{{ $view_degree_management->description }} </br>

                            <strong> Department: </strong> {{ Department::getDepartmentName($view_degree_management->department_id) }} </br>

                             <strong> Year: </strong>{{ Year::getYearsName($view_degree_management->year_id) }} </br>

                            <strong> Semester: </strong>{{ Semester::getSemesterName($view_degree_management->semester_id) }} </br>

                            <strong> Total Credit: </strong>{{ $view_degree_management->total_credit }} </br>

                            <strong> Duration: </strong>{{ $view_degree_management->duration }} </br>

                            <strong> Start Date: </strong> {{ $view_degree_management->start_date }} </br>

                            <strong> End Date: </strong>{{ $view_degree_management->end_date }} </br>

                     </div>

                     <a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close </a>
                     {{--{{ Form::submit('Comments', array('class' => 'btn btn-primary btn-xs')) }}--}}
             {{ Form::close() }}

</div>