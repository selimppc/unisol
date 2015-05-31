
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">CFO Category Information</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large">

                   <tr>
                     <th class="col-lg-8">Title:</th>
                     <td>{{ $model->title }}</td>
                   </tr>

                   <tr>
                     <th class="col-lg-8">Description:</th>
                     <td>{{ $model->description }}</td>
                   </tr>

                   <tr>
                     <th class="col-lg-8">support Name:</th>
                     <td>{{ $model->support_name }}</td>
                   </tr>

                  <tr>
                     <th class="col-lg-8">Support Email:</th>
                     <td>{{ $model->support_email }}</td>
                  </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
