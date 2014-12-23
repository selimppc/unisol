@extends('layouts.master')
@section('sidebar')
    @include('degree_program._sidebar')
@stop
@section('content')
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.4/css/jquery.dataTables.css">

  <div class="span well">
   @if ($degree_programs->count())
  <table class="table table-striped table-bordered" id="myTable">
    <col width="50">
      <col width="180">
      <col width="150">
      <col width="90">
      <col width="150">
      <col width="180">
     <h4>Degree Program Information</h4>
                    <thead>
                    <tr>
                       <td><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value="">
                       </td>
                       <th>DegreeProgram Name</th>

                       <th>Dept Name</th>
                        <th>Degree Level</th>
                         <th>Description</th>
                       <th>Action</th>

                    </tr>
                  </thead>

        <tbody>


                @foreach ($degree_programs as $degree_program)
                    <tr>
                       <td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $degree_program->id }}"></td>

                        <td>{{ $degree_program->title }}</td>
                        <td align="left" class="deptName">{{ Department::getDepartmentName($degree_program->department_id) }}</td>
                        <td align="left" class="degreeProgramName">{{ DegreeLevel::getDegreeLevelName($degree_program->degree_level_id) }}</td>
                        <td>{{ $degree_program->description }}</td>
                        <td>

                           <a data-href="{{ URL::to('degreeprogram/destroy/'.$degree_program->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
                           <a href="{{ URL::to('degreeprogram/show/'.$degree_program->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
                           <a class="btn btn-sm btn-info" href="{{ URL::to('degreeprogram/edit/' . $degree_program->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                           {{--<a class="btn btn-sm btn-info" href="{{ URL::to('roletask/edit/' . $roletask->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>--}}
                        </td>

                    </tr>
                @endforeach
                <div>

                   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                          Add New
                   </button>

                </div>

                <br>
                    <div class="text-right">
                           {{ $degree_programs->links() }}
                    </div>
        </tbody>
    </table>
    @else
      There are no Degree Program
      @endif
  </div>


       <!-- Modal :: Delete Confirmation -->


<div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                       </div>
                       <div class="modal-body">
                             <strong>Are you sure to delete?</strong>
                       </div>
                       <div class="modal-footer">
                         <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                         <a href="#" class="btn btn-danger danger">Delete</a>

                       </div>
                 </div>
               </div>
             </div>



{{--Model: for showing single row info--}}
<div class="modal fade " id="confirm-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel">Department :<b>{{$degree_program->title}}</b></h4>
                       </div>
                {{--<div class="modal-body">--}}

                {{--</div>--}}
                <div style="padding: 20px;">
                    <table>
                    <h4> Information</h4>
                      <tr>
                        <th>Degree Program :</th>
                        <td>{{ $degree_program->title }}</td>
                        </tr>
                         <tr>
                        <th>Name:</th>
                         <td>{{ $degree_program->description }}</td>

                      </tr>
                       <tr>

                            </tr>
                    </table>

                  <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
                </div>
 <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <a href="" class="btn btn-default" >Close</a>
 </div>
 </div>
 </div>
 </div>

<!-- Modal :Add new Degree-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add New Department</h4>
      </div>

      <div class="modal-body">
        <br><br>


        <div style="padding: 20px;">


                {{Form::open(array('url'=>'degreeprogram/store', 'class'=>'form-horizontal'))}}


                {{ Form::label('title','Degree Program Name:') }}
                {{ Form::text('title',Input::old('title'), array('class' => 'form-control')) }}


                 {{ Form::label('department_id', 'DeptName') }}
                 {{ Form::select('department_id',  Department::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                 {{ Form::label('degree_level_id','Degree Level:') }}
                 {{ Form::select('degree_level_id',  DegreeLevel::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                {{ Form::label('description', 'Description:') }}
                {{ Form::text('description',Input::old('description'),array('class' => 'form-control')) }}


                <p>&nbsp;</p>
                {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
                {{ Form::submit('Close', array('class'=>'btn btn-primary')) }}

                {{Form::close()}}


        </div>

      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</div>

{{--Modal : edit --}}

<div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">


      </div>


      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
		$(document).ready(function() {
				$('#myTable').dataTable({
                paging: false

				});

		} );
</script>

@stop

