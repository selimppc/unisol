@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')

<section class="content">
 <div class="box-body">

    <h3> Degree Waiver Constraint</h3>
</div>
 <div class="row">
    <div class="col-xs-12">

      <div class="box">
        <div class="box-header">

        </div><!-- /.box-header -->
<br>

{{------------------------------------Degree Data Table: Starts-------------------------------------------------}}
          <div class="well well-sm">
             <table id="example1" class="table table-bordered table-striped">
                <h4>Degree Waiver Information</h4>
                         <tr>
                                <th> Degree Title :</th>
                                <td>{{ $degree_model->relDegree->title }}</td>

                         </tr>

                         <tr>
                                <th> Waiver :</th>
                                <td>{{ $degree_model->relWaiver->title }}</td>
                         </tr>

                         <tr>
                                 <th> Waiver Type:</th>
                                 <td>{{ $degree_model->relWaiver->waiver_type }}</td>
                         </tr>


              </table>

          </div>
{{----------------------------------------Degree Data Table :Ends-----------------------------------------------------------------------}}


{{-------------------------Degree Waiver Const Table (Time dependent):Starts-----------------------------------------------------------------------}}

<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('deg_waiver_time_const.create', ['degree_waiver_id'=>$degree_model->id ] )}}" data-toggle="modal" data-target="#add" >Add Time Constraint</a>

 <p>&nbsp;</p>

    <table id="example1" class="table table-bordered table-striped">

    <h4>Time Dependent Info</h4>

         <thead>
              <tr>
                 <th>Start Date</th>
                 <th>End Date</th>
                 <th>Action</th>
              </tr>
         </thead>
               <tbody>
                    @foreach($deg_waiver_const as $value)
                                      <tr>
                                            <td>{{ $value->start_date }}</td>

                                            <td>{{ $value->end_date }}</td>

                                            <td>
                                                 <a data-href="{{ URL::to('amw/degree_manage/waiver_const/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
                                                 {{--<a href="{{ URL::to('department/show/'.$department->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
                                            </td>

                                      </tr>
                    @endforeach
              </tbody>

    </table>
{{---------------------------------------Degree Waiver Table :Ends------------------------------------------------------}}

{{--------------------------------Degree Waiver Const Table (GPA dependent):Starts-------------------------------------------------}}

<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('deg_waiver_gpa_const.create', $degree_model->id )}}" data-toggle="modal" data-target="#add" >Add GPA Constraint</a>

 <p>&nbsp;</p>

    <table id="example1" class="table table-bordered table-striped">

    <h4>GPA Dependent Info</h4>

         <thead>
              <tr>
                 <th>Level of Education</th>
                 <th>GPA</th>
                 <th>Action</th>
              </tr>
         </thead>
               <tbody>
                    {{--@foreach($deg_waiver_const as $value)--}}
                                      {{--<tr>--}}
                                            {{--<td>{{ $value->start_date }}</td>--}}

                                            {{--<td>{{ $value->end_date }}</td>--}}

                                            {{--<td>--}}
                                                 {{--<a data-href="{{ URL::to('amw/degree_manage/waiver_const/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
                                                 {{--<a href="{{ URL::to('department/show/'.$department->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
                                            {{--</td>--}}

                                      {{--</tr>--}}
                    {{--@endforeach--}}


              </tbody>

    </table>
{{--------------------------------Degree Waiver Const Table (GPA dependent):Ends-------------------------------------------------}}

        </div><!-- /.box -->
       </div>
    </div>
 </section>

<p>&nbsp;</p>
<p>&nbsp;</p>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: add Information -->
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
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

              <a href="#" class="btn btn-danger danger">Delete</a>
              <a href=" {{URL::previous()}}" class="btn btn-default">Close </a>
            </div>
      </div>
    </div>
  </div>

@stop

