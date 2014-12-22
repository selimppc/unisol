@extends('layouts.master')

@section('sidebar')
    @include('subject.sidebar')
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
                  {{ Form::label('search_text', 'Search Text:',array('class'=>'sr-only')) }}
                  {{ Form::text('search_text', Input::old('search_text'), array('class' => 'form-control','placeholder' => 'Search All')) }}
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
                <td>{{$value->degree_program_id}}</td>
                <td>{{$value->department_id}}</td>
                <td>{{$value->year_id}}</td>
                <td>{{$value->semester_id}}</td>
                <!-- <td>{{$value->start_date}}</td>
                <td>{{$value->end_date}}</td> -->
                <td> 
                   <a data-href="{{ URL::to('term/delete/'.$value->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>

                  <!-- <a href="{{ URL::route('years.edit', ['id'=>$value->id]) }}" class="subEdit btn btn-sm btn-default" data-toggle="modal" data-target="#edit-modal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>

                   <a href="{{ URL::route('years.show', ['id'=>$value->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#show-modal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a> -->
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
                   {{ Form::open(array('url' => 'term/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}

                       @include('termundersemester._form')

                  <button type="button" class="btn btn-danger close" data-dismiss="modal">Cencel</button>
                    {{ Form::close() }}

                </div>
                <div class="modal-footer">                  
                </div>
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