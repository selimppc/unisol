<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title">Show Courses Unser Semester</h4>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 90%;">

     {{ Form::model(array('url'=>'term/show','method' => '')) }}

     <table class="table table-bordered">
        <tr>
            <td> Degree/ProgramName :</td>
            <td width='300'>{{ DegreeProgram::getDegreeProgramName($datas->degree_program_id) }}</td>
        </tr>
        <tr>
            <td>DepartmentName:</td>
            <td> {{ Department::getDepartmentName($datas->department_id) }}</td>
        </tr>
        <tr>
            <td>YearName:</td>
            <td>{{ Year::getYearsName($datas->year_id) }}</td>
        </tr>
       <tr>
            <td>SemesterName:</td>
            <td>{{ Semester::getSemesterName($datas->semester_id)}}</td>
        </tr>
        <tr>
            <td>Start Date</td>
            <td> {{ date('d-m-Y', strtotime($datas->start_date)) }}</td>
        </tr>
        <tr>
            <td>End Date:</td>
            <td>{{ date('d-m-Y', strtotime($datas->end_date)) }}</td>
        </tr>
    </table>

    {{ Form::close() }}
</div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('term/show')}}" class="btn btn-default">Close </a>
</div>