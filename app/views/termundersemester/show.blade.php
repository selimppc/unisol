<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
 <h4 class="modal-title">Show Years</h4>
</div>
<div class="modal-body">
	<div style="padding: 10px; width: 90%;">

       {{ Form::open(array('url'=>'term.show','method' => '')) }}

            <p>
                <strong> Degree/ProgramName :</strong> {{ $datas->degree_program_id }}
                <strong> DepartmentName:</strong> {{ $datas->department_id }}
                <strong> YearName:</strong> {{ $datas->year_id }}
                <strong> SemesterName:</strong> {{ $datas->semester_id }}
                <strong> StartName:</strong> {{ $datas->start_date }}
                <strong> EndDate:</strong> {{ $datas->end_date }}
            </p>

	{{ Form::close() }}
    </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('term.show')}}" class="btn btn-default">Close </a>
</div>