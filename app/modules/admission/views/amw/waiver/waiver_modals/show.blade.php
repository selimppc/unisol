<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 <table style="font-size: large">

                   <tr>
                       <th class="col-lg-6">Title :</th>
                       <td>{{ $waiver_model->title }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Description :</th>
                       <td>{{ $waiver_model->description }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Waiver Type :</th>
                       <td>{{ $waiver_model->waiver_type }}</td>
                   </tr>


                   <tr>
                       <th class="col-lg-6">Amount:</th>
                       <td>{{ $waiver_model->amount }}</td>
                   </tr>

                   <tr>
                       <th class="col-lg-6">Percentage:</th>
                       <td>{{ $waiver_model->is_percentage == 1 ? 'Yes' : 'No' }}</td>

                   </tr>

                   {{--<tr>--}}
                       {{--<th class="col-lg-6">Billing Item:</th>--}}
                       {{--<td>{{ $waiver_model->billing_details_id }}</td>--}}

                   {{--</tr>--}}
                 </table>
           </div>
           <p>&nbsp;</p>
       <a href="" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
       <p>&nbsp;</p>
     </div>
</div>
