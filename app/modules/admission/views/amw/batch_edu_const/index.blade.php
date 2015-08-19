@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
 @include('layouts._sidebar_amw')
@stop

@section('content')

{{-----------------------------------------Help Text -------------------------------------------------------------------------------------}}
<div class="row">
    <div class="col-md-12">
                <h3>Batch Education Constraint</h3>
            <div class="help-text-top">
             You can view all lists of Batch Education Constraints Lists. Also this panel will allow you to perform some actions to <b>Add Education Constraint</b>, <b>Edit</b>, <b>Delete</b>, under the column <b>Action</b>.
                    {{--<small>Someone famous in <cite title="Source Title">Source Title</cite></small>--}}
            </div><!-- /.box-body -->
    </div><!-- ./col -->
</div><!-- /.row -->
{{-----------------------------------------Help Text ends ----------------------------------------------------------------------}}

 <div class="box box-solid ">
        <div class="box box-info">
              <div class="box-header">

                  <div class="box-tools pull-right">
                       <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/batch-education-constraint/create')}}" data-toggle="modal" data-target="#eduConstModal" style="color: #ffffff"><b>Add Education Constraint</b></a>
                  </div>
              <p>&nbsp;</p>
              </div>
              <div class="box-body">
                   <div class="row">
                       <div class="col-lg-12">
                       {{--{{ Form::open(array('url' => 'common/course-type/batch-delete')) }}--}}
                          <table id='example' class="table table-bordered">
                                 <thead>
                                         <tr>
                                             <th>
                                                 <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                             </th>
                                            <th>Batch Number</th>
                                            <th>Level Of Education</th>
                                            <th>Min Gpa</th>
                                            <th>Action</th>
                                         </tr>
                                 </thead>
                                        <tbody>
                                              @if(isset($model))
                                                    @foreach($model as $value)
                                                        <tr>
                                                            <td><input type="checkbox" name="ids[]"  class="myCheckbox" value="{{ $value->id }}">
                                                            </td>
                                                            <td>{{$value->relBatch->batch_number}}</td>

                                                            <td>{{strtoupper($value->level_of_education)}}</td>
                                                            <td>{{$value->min_gpa}}</td>

                                                            <td>
                                                                 <a href="{{ URL::to('admission/amw/batch-education-constraint/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#eduConstModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                                 <a class="btn btn-xs btn-default" href="{{ URL::to('admission/amw/batch-education-constraint/edit/'.$value->id) }}" data-toggle="modal" data-target="#eduConstModal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                                                                 <a data-href="{{ URL::to('admission/amw/batch-education-constraint/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                              @endif
                                        </tbody>
                       {{--{{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}--}}
                          </table>
                       {{ Form::close() }}
                       </div>
                   </div>
              </div>
        </div>

 </div>
<div class="text-right">
    {{ $model->links() }}
</div>

{{----------------------------------------------Modal : degreeGroupModal--------------------------------------------------------------------------}}
<div class="modal fade" id="eduConstModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

              </div>
        </div>
      </div>
    </div>

@stop