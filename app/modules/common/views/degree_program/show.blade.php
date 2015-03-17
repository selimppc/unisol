<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Degree Program Information</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large">

                   <tr>
                     <th class="col-lg-8">Degree Program(Title):</th>
                     <td>{{ $model->title }}</td>
                   </tr>

                   <tr>
                     <th class="col-lg-8">Description:</th>
                     <td>{{ $model->description }}</td>
                   </tr>

                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
