<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
            </span>Prepare Question Paper</a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                     <a href="{{ action('ExmPrepareQuestionPaperController@index') }}"> Home</a> <span class="label label-success"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                     <a href="{{ action('ExmPrepareQuestionPaperController@createQuestionPaper') }}"> ADD</a> <span class="label label-info"></span>
                    </td>
                </tr>

                <tr>
                    <td>
                    <a href="{{ action('ExmPrepareQuestionPaperController@ViewQuestion') }}">View All Questions</a><span  class="label label-default"></span>
                    </td>

                </tr>
            </table>
        </div>
    </div>
</div>



