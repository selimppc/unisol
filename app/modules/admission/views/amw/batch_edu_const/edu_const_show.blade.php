<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information </h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large">

                   <tr>
                       <th class="col-lg-10">Batch Number:</th>
                       <td>{{ $model->relBatch->batch_number }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-10">Level Of Education:</th>
                       <td>{{strtoupper($model->level_of_education) }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-10">Min GPA:</th>
                       <td>{{ $model->min_gpa }}</td>
                   </tr>


                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
