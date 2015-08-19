<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information Of {{$model->relDegreeLevel->code.''.$model->relDegreeGroup->code.' On '.$model->relDegreeProgram->code}}</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large">

                   <tr>
                     <th class="col-lg-8">Description:</th>
                     <td>{{ $model->description }}</td>
                   </tr>

                    <tr>
                       <th class="col-lg-8">Department:</th>
                       <td>{{ $model->relDepartment->title  }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-8">Degree Program:</th>
                        <td>{{ $model->relDegreeProgram->title }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-8">Degree Group:</th>
                        <td>{{ $model->relDegreeGroup->title }}</td>
                    </tr>

                    <tr>
                        <th class="col-lg-8">Total Credit:</th>
                        <td>{{ $model->total_credit }}</td>
                    </tr>

                    <tr>
                       <th class="col-lg-8">Duration:</th>
                       <td>{{ $model->duration }}</td>
                    </tr>

                     <tr>
                        <th class="col-lg-8">Min Credit Per Semester:</th>
                        <td>{{ $model->credit_min_per_semester }}</td>
                     </tr>

                     <tr>
                         <th class="col-lg-8">Max Credit Per Semester:</th>
                         <td>{{ $model->credit_max_per_semester }}</td>
                     </tr>

                     <tr>
                        <th class="col-lg-8"> Retake Policy:</th>
                        <td>{{ strtoupper($model->policy_retake) }}</td>
                     </tr>

                     <tr>
                        <th class="col-lg-8">Course Taking Policy:</th>
                        <td>{{ strtoupper($model->policy_course_taking) }}</td>
                     </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
