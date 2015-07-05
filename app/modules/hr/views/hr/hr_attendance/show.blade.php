<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">Details Information Of {{isset($data->hr_employee_id)?$data->relHrEmployee->relUser->relUserProfile->first_name.' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name:''}}</h4>
    <h5 style="text-align: center;color:#0072b1" >Employee ID : {{isset($data->hr_employee_id)?$data->relHrEmployee->employee_id:''}}</h5>
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
                       <td>{{isset( $data->date )? date("Y-m-d", strtotime($data->date)) :''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Sign In Time :</th>
                       <td>{{isset($data->sign_in_time)?$data->sign_in_time:''}}</td>
                   </tr>


                   <tr>
                       <th class="col-lg-6">Sign Out Time:</th>
                       <td>{{isset($data->sign_out_time)?$data->sign_out_time:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Lunch Break :</th>
                       <td>{{isset($data->lunch_break_out_time)?$data->lunch_break_out_time:''}}  To  {{isset($data->lunch_break_in_time)?$data->lunch_break_in_time:''}}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Break Out Time :</th>
                      <td>{{isset($data->break_out_time)?$data->break_out_time:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Break In Time :</th>
                       <td>{{isset($data->break_in_time)?$data->break_in_time:''}}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Note :</th>
                      <td>{{isset($data->note)?$data->note:''}}</td>
                   </tr>

               </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
