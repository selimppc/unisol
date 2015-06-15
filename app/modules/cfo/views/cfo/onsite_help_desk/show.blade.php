
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
                       <td>{{ $data->name }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Email :</th>
                       <td>{{ $data->email }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Category :</th>
                       <td>{{ $data->relCfoCategory->title }}</td>
                   </tr>


                   <tr>
                       <th class="col-lg-6">Purpose:</th>
                       <td>{{ $data->purpose }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Department:</th>
                       <td>{{ $data->relDepartment->title }}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Assigned To:</th>
                      <td>{{ $data->relUser->relUserProfile->first_name.' '.$data->relUser->relUserProfile->middle_name.' '.$data->relUser->relUserProfile->last_name }}</td>
                   </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
