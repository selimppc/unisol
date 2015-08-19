

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">HR Leave Type</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large" class="table table-striped  table-bordered">
                       <tr>
                         <th class="col-lg-8">Title:</th>
                         <td>{{ isset($model->title)?$model->title:'' }}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Code:</th>
                         <td>{{isset($model->code)?$model->code:''}}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Employee Type:</th>
                         <td>{{ isset( $model->employee_type)? ucfirst($model->employee_type):''}}</td>
                       </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
