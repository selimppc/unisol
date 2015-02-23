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
<div class="col-xs-6">

<div class="box">
<div class="box-header">

</div><!-- /.box-header -->


<br>

{{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
<div class="well well-lg">
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
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('waiver/create')}}" data-toggle="modal" data-target="#addWaiver" >Add Waiver</a>


{{--</div><!-- /.box-body -->--}}
</div><!-- /.box -->
</div>
</div>
</section>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: add Information -->
<div class="modal fade" id="addWaiver" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>


@stop

