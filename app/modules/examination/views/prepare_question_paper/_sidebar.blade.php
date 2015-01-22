<div class="panel panel-default">


    <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                </span>Prepare Question Paper : AMW </a>
            </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                     <a href="{{ action('ExmPrepareQuestionPaperController@amw_index') }}"> Home</a> <span class="label label-success"></span>
                    </td>
                </tr>

                 <tr>
                    <td>
                     <a href="{{ action('ExmPrepareQuestionPaperController@amw_QuestionList') }}"> Question List</a> <span class="label label-success"></span>
                    </td>
                 </tr>

                 <tr>
                     <td>
                      <a href="{{ action('ExmPrepareQuestionPaperController@amw_ViewQuestion') }}"> View Questions</a> <span class="label label-success"></span>
                     </td>
                 </tr>



            </table>
        </div>
    </div>


    <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-th">
                    </span>Prepare Question Paper : Faculty</a>
                </h4>
    </div>

    <div id="collapseThree" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                         <a href="{{ action('ExmPrepareQuestionPaperController@faculty_index') }}"> Home</a> <span class="label label-success"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                         <a href="{{ action('ExmPrepareQuestionPaperController@faculty_QuestionList') }}"> Question List</a> <span class="label label-success"></span>
                        </td>
                    </tr>

                    <tr>
                         <td>
                          <a href="{{ action('ExmPrepareQuestionPaperController@faculty_ViewQuestion') }}"> View Questions</a> <span class="label label-success"></span>
                         </td>
                    </tr>



                </table>
            </div>
    </div>

</div>