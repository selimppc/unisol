
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Show Information</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

        {{--{{Form::open(array('url'=>'applicant/miscellaneous_info/update/'.$data->id, 'class'=>'form-horizontal','files'=>true))}}--}}
<table style="font-size: large">

      <tr>
        <th> Level of Education:</th>
        <td>{{ $model->level_of_education }}</td>
      </tr>

      <tr>
        <th>Name of Examination:</th>
        <td>{{ $model->degree_name }}</td>

      </tr>

      <tr>
         <th> Name of Institution:</th>
         <td>{{ $model->institute_name }}</td>

      </tr>

      <tr>
        <th> Academic Group:</th>
        <td>{{ $model->group }}</td>

      </tr>
      <tr>
        <th> major Subject:</th>
        <td>{{ $model->major_subject }}</td>

    </tr>
    <tr>
        <th>Result Type :</th>
        <td>{{ $model->result_type }}</td>

    </tr>
    <tr>
      <th>Result:</th>
      <td>{{ $model->gpa }}</td>

    </tr>
    <tr>
      <th>Roll :</th>
      <td>{{ $model->roll_number }}</td>

    </tr>

     <tr>
          <th>Registration Number:</th>
          <td>{{ $model->registration_number }}</td>

     </tr>

     <tr>
               <th>Passing Year:</th>
               <td>{{ $model->year_of_passing }}</td>

          </tr>

          <tr>
                    <th>Duration :</th>
                    <td>{{ $model->duration }}</td>

               </tr>

               <tr>
                         <th>Study At:</th>
                         <td>{{ $model->study_at }}</td>

                    </tr>
    </table>


        <p>&nbsp;</p>

        <a href="{{URL::to('applicant/academic_records/index') }} " class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>
<br>
        {{Form::close()}}
  </div>
</div>
{{--<div class="modal-footer">--}}

 {{----}}

{{--</div>--}}


