<div class="panel panel-default">
    @if((Role::find(Auth::user()->get()->role_id)->title)=='amw')

        <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
                    </span>You loggged in as <strong>{{ ucwords(Auth::user()->get()->username) }} </strong></a>
                </h4>
        </div>

        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">

                    <tr>
                        <td>
                         <a href="{{ URL::to('amw/admission_test/deshboard') }}">Home </a>
                         <span class="label label-success"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                         <a href="{{ URL::to('amw/admission_test/index') }}">Admission Test</a>
                         <span class="label label-success"></span>
                        </td>
                    </tr>

                </table>
            </div>
        </div>


    @endif

</div>

