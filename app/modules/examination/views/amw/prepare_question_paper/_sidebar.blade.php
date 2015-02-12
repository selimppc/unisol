<div class="panel panel-default">
    <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                </span>You loggged in as <strong>{{ ucwords(Auth::user()->username) }} </strong></a>
            </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                     <a href="{{ action('ExmAmwController@index') }}"> Home</a> <span class="label label-success"></span>
                    </td>
                </tr>

                 <tr>
                    <td>
                     <a href="{{ action('ExmAmwController@questionList') }}"> Question Items</a> <span class="label label-success"></span>
                    </td>
                 </tr>
            </table>
        </div>
    </div>

</div>