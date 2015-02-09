@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')
<br>

<div class="well well-lg">
<table class="table table-striped table-bordered" id="myTable">
<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/academic_records/create')}}">Add Academic Records</a>
<col width="150">
<col width="80">


     <h4 style="font-size: large">Academic Records </h4>

           <thead>



           </thead>

        <tbody>

     <br><br>
     </tbody>
    </table>

</div>


 <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
    </div>

    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
            </div>
          </div>
    </div>

@stop