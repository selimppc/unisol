<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"><b>User :</b> {{$data->name}},&nbsp;&nbsp;<b>Support Code : </b>{{$data->support_code}}</h4>
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
                      <th class="col-lg-6">Phone:</th>
                      <td>{{ $data->phone }}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Subject:</th>
                      <td>{{ $data->subject }}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Priority:</th>
                      <td>{{ $data->priority }}</td>
                   </tr>

                    <tr>
                       <th class="col-lg-6">Support Code:</th>
                       <td>{{ $data->support_code }}</td>
                    </tr>

                   <tr>
                       <th class="col-lg-6">Category :</th>
                       <td>{{ $data->relCfoCategory->title }}</td>
                   </tr>

                   <tr>
                      <th class="col-lg-6">Status :</th>
                      <td>{{ $data->status }}</td>
                   </tr>

               </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
