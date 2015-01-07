
<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
            </span>Applicant </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                     <a href="{{ action('EnrollmentController@create') }}">Select Course</a> <span class="label label-info"></span>


                    </td>
                </tr>
                {{--<tr>--}}
                    {{--<td>--}}
                     {{--<a href="{{ action('CourseController@create') }}">Create Course </a> <span class="label label-info"></span>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                <tr>

                </tr>
            </table>
        </div>
    </div>
    </div>




<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-th">
            </span>Student</a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                {{--<tr>--}}
                    {{--<td>--}}
                     {{--<a href="{{ action('SemesterController@index') }}">All semester</a> <span class="label label-success"></span>--}}
                    {{--</td>--}}
                {{--</tr>--}}
                {{--<tr>--}}
                    {{--<td>--}}
                      {{--<a href="{{ action('SemesterController@create') }}">Create New Semester</a> <span class="label label-info"></span>--}}
                    {{--</td>--}}

                {{--</tr>--}}

            </table>
        </div>
    </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                </span>Accounts</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    {{--<tr>--}}
                        {{--<td>--}}


                        {{--</td>--}}
                    {{--</tr>--}}
                    {{--<tr>--}}
                        {{--<td>--}}
                            {{--<a href="{{ action('DegreeLevelController@create') }}">Create a New Degree level</a> <span class="label label-info"></span>--}}
                        {{--</td>--}}
                    {{--</tr>--}}

                </table>
            </div>
        </div>
        </div>




