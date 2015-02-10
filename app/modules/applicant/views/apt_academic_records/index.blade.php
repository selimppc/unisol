@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')


<section class="content">
<div class="box-body">
    <p>
        <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/academic_records/create')}}">Add Academic Records</a>
    </p>

</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">
    <h4 style="font-size: large">Academic Records </h4>
</div><!-- /.box-header -->
<div class="box-body table-responsive">
<table id="example1" class="table table-bordered table-striped">
<col width="25">
<col width="250">
<col width="100">
<col width="120">
<col width="170">
<thead>
<tr>

   <th>Level Of Education</th>
   <th>Board / University</th>
   <th>Passing Year</th>

   <th>Result</th>
   <th>Action</th>

</tr>
</thead>
<tbody>


<tr>
     <td>{{ $model != null ? $model->level_of_education : null }}</td>
     <td></td>
     <td>{{ $model != null ? $model->year_of_passing : null }}</td>
     <td>{{ $model != null ? $model->gpa : null }}</td>
     <td>


    <a href="{{ URL::to('applicant/academic_records/show/'.$model->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
    <a class="btn btn-xs btn-default" href="" data-toggle="modal" data-target="#myeditModal" ><span class="glyphicon glyphicon-edit"></span></a>
    <a data-href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
    </td>
</tr>



</tbody>

</table>
</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
</section>

{{---------------------------------------------------Modals-----------------------------------------------}}

<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>


@stop