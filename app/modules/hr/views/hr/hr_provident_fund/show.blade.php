<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large" class="table table-striped  table-bordered">

                   <tr>
                       <th class="col-lg-6">HR Employee :</th>
                       <td>{{isset($data->hr_employee_id)?$data->relHrEmployee->relUser->relUserProfile->first_name.' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Date :</th>
                       <td>{{isset( $data->date )? $data->date:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Month :</th>
                       <td>{{  isset($data->month)?ucfirst($data->month):''}}</td>
                   </tr>


                   <tr>
                       <th class="col-lg-6">Employee Contribution Amount:</th>
                       <td>{{  isset($data->employee_contribution_amount)?$data->employee_contribution_amount:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Company Contribution Amount:</th>
                       <td>{{isset($data->company_contribution_amount)?$data->company_contribution_amount:''}}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Status :</th>
                      <td>{{isset($data->status)?ucfirst($data->status):''}}</td>
                  </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
