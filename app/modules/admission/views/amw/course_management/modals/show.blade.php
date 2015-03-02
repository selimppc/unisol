

<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Details Information of Course : <b>{{$model->relCourse->title}}</b></h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

        {{--{{Form::open(array('url'=>'applicant/miscellaneous_info/update/'.$data->id, 'class'=>'form-horizontal','files'=>true))}}--}}
<table style="font-size: large">

      <tr>
        <th> Degree:</th>
        <td>{{ $model->relDegree->title }}</td>
      </tr>

      <tr>
        <th>Course Type:</th>
        <td>{{ $model->relCourseType->title }}</td>

      </tr>

      <tr>
         <th> Course:</th>
         <td>{{ $model->relCourse->title }}</td>

      </tr>

      <tr>
        <th> Year:</th>
        <td>{{ $model->relYear->title }}</td>

      </tr>

      <tr>
        <th> Semester:</th>
        <td>{{ $model->relSemester->title }}</td>

    </tr>

    <tr>
        <th>Evaluation System :</th>
        <td>{{ $model->evolution_system }}</td>

    </tr>

    <tr>
      <th>Major/Minor:</th>
      <td>{{ $model->major_minor }}</td>

    </tr>

    <tr>
      <th>Start Date:</th>
      <td>{{ $model->start_date }}</td>

    </tr>

     <tr>
          <th>End Date:</th>
          <td>{{ $model->end_date }}</td>

     </tr>


    </table>


        <p>&nbsp;</p>

        <a href="{{URL::to('amw/course_manage') }} " class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>

<br>
        {{Form::close()}}
  </div>
</div>
