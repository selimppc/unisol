<div class="panel panel-default">

    <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                    </span>Prepare Question Paper : Faculty</a>
                </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                         <a href="{{ action('ExmFacultyController@index') }}"> Home</a> <span class="label label-success"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                         <a href="{{ action('ExmFacultyController@questionList') }}"> Question Items</a> <span class="label label-success"></span>
                        </td>
                    </tr>
                </table>
            </div>
    </div>
</div>