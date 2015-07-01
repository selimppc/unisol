

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">HR Work Week</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large" class="table table-striped  table-bordered">
                       <tr>
                         <th class="col-lg-8">Year:</th>
                         <td>{{ isset($model->year_id)?$model->relYear->title:'' }}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Month:</th>
                         <td>{{isset($model->month)?ucfirst($model->month):''}}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Day:</th>
                         <td>{{ isset( $model->day)? ucfirst($model->day):''}}</td>
                       </tr>

                      <tr>
                         <th class="col-lg-8">Status:</th>
                         <td>{{isset($model->status)? ucfirst($model->status):''}}</td>
                      </tr>
                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
