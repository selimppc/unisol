@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
 <div class="box-body">

    <h3> Degree Waiver</h3>


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

                         <tr>
                                <th> Degree Title :</th>
                                <td>{{ $degree_model->title }}</td>
                         </tr>

                         <tr>
                                <th> Department:</th>
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
                                  <th>Duration:</th>
                                  <td>{{ $degree_model->duration }}</td>

                         </tr>

                         <tr>
                                  <th>Total Credit :</th>
                                  <td>{{ $degree_model->total_credit }}</td>

                         </tr>



              </table>

          </div>
{{----------------------------------------Degree Data Table :Ends-----------------------------------------------------------------------}}


{{----------------------------------------Degree Waiver Table : Starts-----------------------------------------------------------------------}}

<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('degree_waiver.create', ['degree_id'=>$degree_model->id] )}}" data-toggle="modal" data-target="#addWaiver" >Add Waiver</a>

<a class="pull-left btn btn-sm btn-info" href="{{ URL::to('amw/degree_manage' )}}" >Degree Management</a>

 <p>&nbsp;</p>
 <p>&nbsp;</p>

    <table id="example1" class="table table-bordered table-striped">

      <col width="120">
      <col width="120">
      <col width="100">
      <col width="120">
      <col width="120">

         <thead>
              <tr>

                 <th>Degree Title</th>
                 <th>Waiver</th>
                 <th>Amount</th>
                 <th>Status</th>
                 <th>Action</th>

              </tr>
         </thead>
               <tbody>

                @foreach($degree_waiver as $value)
                      <tr>
                            <td>{{ $degree_model->title }}</td>
                            <td>{{ $value->relWaiver->title }}</td>
                            <td>{{ $value->relWaiver->amount }}</td>
                            <td> </td>
                            <td>
                                 <a href = "{{ URL::to('degree_waiver.delete'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
                                 {{--<a href="{{ URL::to('department/show/'.$department->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>--}}
                            </td>

                      </tr>
                @endforeach

              </tbody>

    </table>
{{---------------------------------------Degree Waiver Table :Ends------------------------------------------------------}}

        </div><!-- /.box -->
       </div>
    </div>
 </section>

<p>&nbsp;</p>
<p>&nbsp;</p>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: add Information -->
<div data-backdrop="static" data-keyboard="false" class="modal fade" id="addWaiver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
              {{--<a href="{{URL::to('department/index')}}" class="btn btn-default">Close </a>--}}
            </div>
      </div>
    </div>
  </div>


@stop

