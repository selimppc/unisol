
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
        <td>{{ $degree_model->title }}</td>

    </tr>

     <tr>
            <th>Description :</th>
            <td>{{ $degree_model->description }}</td>

        </tr>

      <tr>
        <th> Degree:</th>
        <td>{{ $degree_model->relDepartment->title }}</td>
      </tr>

      <tr>
              <th> Year:</th>
              <td>{{ $degree_model->relYear->title }}</td>

            </tr>



      <tr>
        <th> Semester:</th>
        <td>{{ $degree_model->relSemester->title }}</td>

    </tr>



    <tr>
      <th>Total Credit:</th>
      <td>{{ $degree_model->total_credit }}</td>

    </tr>

     <tr>
          <th>Duration:</th>
          <td>{{ $degree_model->duration }}</td>

        </tr>

    <tr>
      <th>Start Date:</th>
      <td>{{ $degree_model->start_date }}</td>

    </tr>

     <tr>
          <th>End Date:</th>
          <td>{{ $degree_model->end_date }}</td>

     </tr>


    </table>


        <p>&nbsp;</p>

        <a href="{{URL::to('amw/degree_manage')}}" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
<br>
        {{Form::close()}}
  </div>
</div>
