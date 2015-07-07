

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">HR LEAVE</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large" class="table table-striped  table-bordered">

                       <tr>
                          <th class="col-lg-6">Forward To :</th>
                          <td>{{isset($model->forward_to)?$model->relHrEmployee->relUser->relUserProfile->first_name.' '.$model->relHrEmployee->relUser->relUserProfile->middle_name.' '.$model->relHrEmployee->relUser->relUserProfile->last_name:''}}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Leave Type:</th>
                         <td>{{ isset($model->hr_leave_type_id)?$model->relHrLeaveType->title:'' }}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Reason:</th>
                         <td>{{isset($model->reason)?$model->reason:''}}</td>
                       </tr>

                       <tr>
                         <th class="col-lg-8">Leave Duration:</th>
                         <td>{{ isset( $model->leave_duration)? ucfirst($model->leave_duration):''}}</td>
                       </tr>

                      <tr>
                         <th class="col-lg-8">Start Date:</th>
                         <td>{{isset($model->from_date)?$model->from_date:''}}</td>
                      </tr>

                      <tr>
                        <th class="col-lg-8">End Date:</th>
                        <td>{{isset($model->to_date)? $model->from_date:''}}</td>
                      </tr>

                      <tr>
                         <th class="col-lg-8">Alt Contact No:</th>
                         <td>{{isset($model->alt_contact_no)? $model->alt_contact_no:''}}</td>
                      </tr>

                      <tr>
                         <th class="col-lg-6">Alt Hr Employee :</th>
                         <td>{{isset($model->alt_hr_employee_id)?$model->relHrEmployee->relUser->relUserProfile->first_name.' '.$model->relHrEmployee->relUser->relUserProfile->middle_name.' '.$model->relHrEmployee->relUser->relUserProfile->last_name:''}}</td>
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
