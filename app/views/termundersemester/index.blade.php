@extends('layouts.master')

@section('sidebar')
    @include('termundersemester.sidebar')
@stop

@section('content')

<h1>{{$title}}</h1>
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px">
                 Add New
        </button>

          <!-- search db  -->
           <div class="wrapper text-right no-padder" style="margin-top: 20px">
            {{ Form::open(array('url' =>'term/show', 'class'=>'form-inline', 'role' => 'form')) }}
                <div class="form-group">
                  {{ Form::select('department', [''=>'Department']+ Department::lists('title','id'), Input::old('department'), ['class'=>'form-control']  )}}
                  {{ Form::select('year', [''=>'Year']+ Year::lists('title','id'), Input::old('year'), ['class'=>'form-control']  )}}
                  {{ Form::select('semester', [''=>'Semester']+ Department::lists('title','id'), Input::old('semester'), ['class'=>'form-control']  )}}
                  {{ Form::select('program', [''=>'Program']+ DegreeProgram::lists('title','id'), Input::old('program'), ['class'=>'form-control']  )}}
                </div>
                {{ Form::submit('Search', array('class' => 'btn btn-info')) }}
            {{ Form::close() }}
            </div>

          <!-- search db ends -->

    {{ Form::open(array('url' => 'term/batch/delete')) }}
        <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
              <th>
              <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
               </th>
                <th>Id</th>
                <th>Degree/ProgramName </th>
                <th>DepartmentName</th>
                <th>YearName</th>
                <th>SemesterName</th>
                <th>StartName</th>
                <th>EndDate</th>
                <th>Action</th>
            </tr>
        </thead>


        <tbody>
            @foreach ($datas as $value)
            <tr>
                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}">
                </td>
                <td>{{$value->id}}</td>
                <td>{{ DegreeProgram::getDegreeProgramName($value->degree_program_id) }}</td>
                <td>{{ Department::getDepartmentName($value->department_id) }}</td>
                <td>{{ Year::getYearsName($value->year_id) }}</td>
                <td>{{ Semester::getSemesterName($value->semester_id)}}</td>
                <td>{{ date('d-m-Y', strtotime($value->start_date)) }}</td>
                <td>{{ date('d-m-Y', strtotime($value->end_date)) }}</td>

            
                <td width="135">
                     <a data-href="{{ URL::to('term/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                     <a href="{{ URL::route('term.edit', ['id'=>$value->id]) }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>

                     <a href="{{ URL::route('term.show', ['id'=>$value->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#show-modal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>
                </td>
            </tr>
            @endforeach
          </tbody>
          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
    {{ Form::close() }}

    {{ $datas->links() }}


    <!-- Modal add new term courses under semester -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New</h4>
                </div>
                <div class="modal-body">
                   {{ Form::open(array('url' => 'term/save', 'method' =>'post', 'role'=>'form','class' => 'form-horizontal')) }}

                       @include('termundersemester._form')

                    {{ Form::close() }}

                </div>
                <div class="modal-footer">
                   <a href="{{URL::to('term/show')}}" class="btn btn-default">Close </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Edit -->
   <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit info</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                   <a href="{{URL::to('term/show')}}" class="btn btn-default">Close </a>
                </div>
            </div>
        <div class="modal-footer">
       <!--  <button type="button" class="btn btn-default close" data-dismiss="modal">Close</button> -->
      </div>
      </div>
   </div>


    <!-- Modal for show -->
       <div class="modal fade" id="show-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">

            </div>
          </div>
       </div>


    <!-- Modal for delete -->
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
                <button type="button" class="btn btn-default close" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>

@stop