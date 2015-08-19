
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">{{isset($model->applicant_id)?$model->relApplicant->first_name:''}}'s Exam Center</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large" class="table table-striped  table-bordered">
                       <tr>
                          <th class="col-lg-8">Applicant Name</th>
                          <td>{{ isset($model->applicant_id)?$model->relApplicant->first_name.''.$model->relApplicant->last_name:''}}</td>
                       </tr>
                       <tr>
                           <th class="col-lg-8">Batch No#</th>
                           <td>{{ isset($model->batch_id)?$model->relBatch->batch_number:''}}</td>
                       </tr>
                       <tr>
                          <th class="col-lg-8">Exam Center:</th>
                          <td>{{ isset($model->relExmCenter->title)?$model->relExmCenter->title:''}}</td>
                       </tr>
                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
