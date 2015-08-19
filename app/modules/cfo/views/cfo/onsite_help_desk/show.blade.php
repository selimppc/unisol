
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large" class="table table-striped  table-bordered">

                   <tr>
                       <th class="col-lg-6">Name :</th>
                       <td>{{isset($data->name)?$data->name:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Email :</th>
                       <td>{{isset( $data->email )? $data->email :''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Category :</th>
                       <td>{{  isset($data->cfo_category_id)?$data->relCfoCategory->title:''}}</td>
                   </tr>


                   <tr>
                       <th class="col-lg-6">Purpose:</th>
                       <td>{{  isset($data->purpose)?$data->purpose:''}}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Department:</th>
                       <td>{{isset($data->section_dept_id)?$data->relDepartment->title:''}}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Assigned To:</th>
                      <td>{{ isset($data->specific_user_id)? $data->relUser->relUserProfile->first_name.' '.$data->relUser->relUserProfile->middle_name.' '.$data->relUser->relUserProfile->last_name:'' }}</td>
                   </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
