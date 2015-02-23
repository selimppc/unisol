
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

        {{--{{Form::open(array('url'=>'applicant/miscellaneous_info/update/'.$data->id, 'class'=>'form-horizontal','files'=>true))}}--}}
<table style="font-size: large">

    <tr>
        <th>Title :</th>
        <td>{{ $waiver_model->title }}</td>
     </tr>


    <tr>
        <th>Amount:</th>
        <td>{{ $waiver_model->amount }}</td>
    </tr>

    <tr>
        <th>Percentage:</th>
        <td>{{ $waiver_model->is_percentage == 1 ? 'Yes' : 'No' }}</td>

    </tr>

    {{--<tr>--}}
        {{--<th>Billing Item:</th>--}}
        {{--<td>{{ $waiver_model->billing_details_id }}</td>--}}

    {{--</tr>--}}


    </table>
    <p>&nbsp;</p>

        <a href="{{URL::to('amw/waiver_manage') }} " class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
<br>
        {{Form::close()}}
  </div>
</div>
