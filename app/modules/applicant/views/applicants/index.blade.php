@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

  <div class="span well">
  <table class="table table-striped table-bordered" id="myTable">
    <col width="50">
      <col width="180">
      <col width="100">
      <col width="90">
      <col width="120">
      <col width="180">
       <col width="50">
        <col width="50">
         <col width="50">
          <col width="50">
     <h4> Information</h4>
                    <thead>
                    <tr>
                       <td><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value="">
                       </td>
                        <th>Applicant's name</th>
                        <th>Father's Name</th>
                        <th>Mother's Name</th>
                        <th>Father's occupation</th>
                        <th>Father's Phone</th>
                        <th>Freedom fighter</th>
                        <th>Mother's occupation</th>
                        <th>Mother's Phone</th>
                        <th>National_id</th>
                        <th>driving_license</th>
                        <th>passport</th>
                        <th>place_of_birth</th>
                        <th>marital_status</th>
                        <th>nationality</th>
                        <th>religion</th>
                        <th>signature</th>
                        <th>present_address</th>
                        <th>parmanent_address</th>
                        <th>Action</th>


                    </tr>
                  </thead>

        <tbody>

                @foreach ($applicant_list as $applicants)
                                    <tr >
                                       <td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $applicants->id }}"></td>

                                       <td align="left" class="Applicant">{{ User::getUserName($applicants->user_id) }}</td>

                                        <td>{{ $applicants->fathers_name }}</td>
                                        <td>{{ $applicants->mothers_name }}</td>
                                        <td>{{ $applicants->fathers_occupation }}</td>
                                        <td>{{ $applicants->fathers_phone }}</td>
                                        <td>{{ $applicants->freedom_fighter }}</td>
                                        <td>{{ $applicants->mothers_occupation }}</td>
                                        <td>{{ $applicants->mothers_phone }}</td>
                                        <td>{{ $applicants->national_id }}</td>
                                        <td>{{ $applicants->driving_license }}</td>
                                        <td>{{ $applicants->passport }}</td>
                                        <td>{{ $applicants->place_of_birth }}</td>
                                        <td>{{ $applicants->marital_status }}</td>
                                        <td>{{ $applicants->nationality }}</td>
                                        <td>{{ $applicants->religion }}</td>
                                        <td>{{ $applicants->signature }}</td>
                                        <td>{{ $applicants->present_address }}</td>
                                        <td>{{ $applicants->parmanent_address }}</td>




                                        <td>
                                        <a data-href="{{ URL::to('applicant/delete/'.$applicants->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>
                                        <a href="{{ URL::to('applicant/show/'.$applicants->id) }}" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirm-show"><span class="glyphicon glyphicon-eye-open text-danger"></span></a>
                                         <a class="btn btn-sm btn-info" href="{{ URL::to('roletask/edit/' . $roletask->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                                        <a class="btn btn-sm btn-info" href="{{ URL::to('applicant/edit/' . $applicants->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
                                        </td>

                                    </tr>
                                @endforeach
                                 <br><br>
     {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">--}}
           {{--Add New--}}
     {{--</button>--}}

        </tbody>
    </table>
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


<!--Model: for showing single row info -->
<div class="modal fade " id="confirm-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                 <div class="modal-content">
                       <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                         <h4 class="modal-title" id="myModalLabel"></h4>
                       </div>
                <div class="modal-body">

                </div>

 <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      <a href="" class="btn btn-default" >Close</a>
 </div>
 </div>
 </div>
 </div>

<!-- Modal :Add new applicant-->
<div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
<h4 class="modal-title" id="myModalLabel">Add New Applicant</h4>
</div>
<div class="modal-body">
{{ Form::open(array('url' => 'applicant/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
@include('applicant::applicants._form')
{{ Form::close() }}
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>

<!-- Modal : edit -->
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





@stop

