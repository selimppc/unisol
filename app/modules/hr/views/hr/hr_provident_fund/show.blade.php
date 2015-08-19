
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center;"> INFORMATION OF <span style="color: seagreen">
    {{--{{isset($exam_data->relAcmMarksDistItem['title']) ? $exam_data->relAcmMarksDistItem['title'] : ''}},--}}
    {{isset($data->hr_employee_id)?$data->relHrEmployee->relUser->relUserProfile->first_name.' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name:''}}</span>
    </h4>
</div>

<div class="modal-body">
     <div style="padding: 30px;">
           <table id="" class="table table-bordered table-hover table-striped" style="font-size: medium">
                  <tr>
                      <th class="col-lg-6">HR Employee :</th>
                      <td>{{isset($data->hr_employee_id)?$data->relHrEmployee->relUser->relUserProfile->first_name.' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name:''}}</td>
                  </tr>

                  <tr>
                      <th class="col-lg-6">Date :</th>
                      <td>{{isset( $data->date )? date("Y-m-d", strtotime($data->date)):''}}</td>
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
           <p>&nbsp;</p>
           <a href="" class="pull-right btn btn-bitbucket btn-xs" span class="glyphicon-refresh">Close</a>
           <p>&nbsp;</p>
     </div>
</div>
