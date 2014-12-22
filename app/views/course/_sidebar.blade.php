

<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user">
            </span> Course </a>
        </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                     <a href="{{ action('CourseController@create') }}">Create Course</a> <span class="label label-info"></span>


                    </td>
                </tr>
                <tr>
                    <td>
                     <a href="{{ action('CourseController@create') }}">Create Course </a> <span class="label label-info"></span>
                    </td>
                </tr>
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
            </span>Semester</a>
        </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                     <a href="{{ action('SemesterController@index') }}">All semester</a> <span class="label label-success"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                      <a href="{{ action('SemesterController@create') }}">Create New Semester</a> <span class="label label-info"></span>
                    </td>

                </tr>

            </table>
        </div>
    </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                </span>Degree Level</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>


                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="{{ action('DegreeLevelController@create') }}">Create a New Degree level</a> <span class="label label-info"></span>
                        </td>
                    </tr>

                </table>
            </div>
        </div>
        </div>




<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
            </span> Course Type </a>
        </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                         <a href="{{ action('CourseTypeController@index') }}">All Course Type</a> <span class="label label-success"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                         <a href="{{ action('CourseTypeController@index') }}">Create New Course Type</a> <span class="label label-success"></span>
                    </td>
                </tr>
                <tr>

                </tr>
            </table>
        </div>
    </div>
    </div>




   <div class="panel panel-default">
       <div class="panel-heading">
           <h4 class="panel-title">
               <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-th">
               </span>Target Role</a>
           </h4>
       </div>
       <div id="collapseFive" class="panel-collapse collapse">
           <div class="panel-body">
               <table class="table">
                   <tr>
                       <td>
                           <a href="{{ action('TargetRoleController@index') }}">All Target Role</a> <span class="label label-success"></span>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <a href="{{ action('TargetRoleController@create') }}">Create New Target Role</a> <span class="label label-info"></span>
                       </td>
                   </tr>
                   <tr>

                   </tr>
               </table>
           </div>
       </div>
       </div>




<div class="panel panel-default">
       <div class="panel-heading">
           <h4 class="panel-title">
               <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"><span class="glyphicon glyphicon-th">
               </span>Task List </a>
           </h4>
       </div>
       <div id="collapseSix" class="panel-collapse collapse">
           <div class="panel-body">
               <table class="table">
                   <tr>
                       <td>
                           <a href="{{ action('TaskListRoleController@index') }}">All Task List</a> <span class="label label-success"></span>
                       </td>
                   </tr>
                   <tr>
                       <td>
                           <a href="{{ action('TaskListRoleController@create') }}">Create New Task List</a> <span class="label label-info"></span>
                       </td>
                   </tr>
                   <tr>

                   </tr>
               </table>
           </div>
       </div>
       </div>



<div class="panel panel-default">
    <div class="panel-heading">
        <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"><span class="glyphicon glyphicon-th">
            </span> Role Task User </a>
        </h4>
    </div>
    <div id="collapseSeven" class="panel-collapse collapse">
        <div class="panel-body">
            <table class="table">
                <tr>
                    <td>
                      <a href="{{ action('RoleTaskUserController@index') }}">All Role Task User</a> <span class="label label-success"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                     <a href="{{ action('RoleTaskUserController@create') }}">Create Role Task User</a> <span class="label label-info"></span>
                    </td>
                </tr>
                <tr>

                </tr>
            </table>
        </div>
    </div>
    </div>
