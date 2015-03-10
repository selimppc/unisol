<div class="panel panel-default">

    @if((Role::find(Auth::user()->get()->role_id)->title)=='amw')

        <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                    </span>You loggged in as <strong>{{ ucwords(Auth::user()->get()->username) }} </strong></a>
                </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">

                    <tr>
                        <td>
                         <a href="{{ URL::to('examination/amw/deshboard') }}"> Home </a> <span class="label label-success"></span>
                        </td>
                    </tr>

                    <tr>
                         <td>
                          <a href="{{ URL::to('examination/amw/examination') }}"> Examination</a> <span class="label label-success"></span>
                         </td>
                    </tr>

                </table>
            </div>
        </div>

    @elseif((Role::find(Auth::user()->get()->role_id)->title)=='faculty')

        <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-in">
                        </span>You loggged in as <strong>{{ ucwords(Auth::user()->get()->username) }} </strong></a>
                    </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse in">
                <div class="panel-body">
                    <table class="table">

                        <tr>
                            <td>
                                <a href=""> Home </a> <span class="label label-success"></span>
                            </td>
                        </tr>


                        <tr>
                            <td>
                             <a href="{{ action('ExmFacultyController@index') }}"> Question Papers</a> <span class="label label-success"></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                             <a href="{{ action('ExmFacultyController@questionList') }}"> Question List</a> <span class="label label-success"></span>
                            </td>
                        </tr>
                    </table>
                </div>
        </div>
    @endif

</div>

