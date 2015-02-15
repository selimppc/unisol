@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="well well-lg">
<table class="table table-striped table-bordered" id="myTable">

     <h4> Personal Information </h4>
     @if($applicant_personal_info != null)

      <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('apt/personal_info/edit/' . $applicant_personal_info->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>
      @else
      <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('apt/personal_info/create')}}" data-toggle="modal" data-target="#addModal" >Add </a>
      @endif
                    <thead>


                         <tr>
                            <td>Fathers Name</td>
                               <td>
                               {{ $applicant_personal_info != null ? $applicant_personal_info->fathers_name : null }}
                               </td>
                         </tr>

                           <tr>
                              <td>Fathers Occupation</td>
                                <td>
                                {{ $applicant_personal_info != null ? $applicant_personal_info->fathers_occupation : null }}
                                </td>
                           </tr>

                           <tr>
                             <td>Fathers Phone</td>
                               <td>
                               {{ $applicant_personal_info != null ? $applicant_personal_info->fathers_phone : null }}
                               </td>
                           </tr>

                          <tr>
                            <td>Mothers Name</td>
                            <td>
                            {{ $applicant_personal_info != null ? $applicant_personal_info->mothers_name : null }}
                          </td>
                         </tr>

                           <tr>
                             <td>Mothers Occupation</td>
                               <td>
                               {{ $applicant_personal_info != null ? $applicant_personal_info->mothers_occupation : null }}
                             </td>
                         </tr>

                         <tr>
                           <td>Mothers phone</td>
                               <td>
                               {{ $applicant_personal_info != null ? $applicant_personal_info->mothers_phone : null }}
                               </td>
                         </tr>

                         <tr>
                            <td>Passport</td>
                              <td>
                              {{ $applicant_personal_info != null ? $applicant_personal_info->passport : null }}
                              </td>
                         </tr>

                         <tr>
                             <td>National id</td>
                               <td>
                                {{ $applicant_personal_info != null ? $applicant_personal_info->national_id : null }}
                               </td>
                          </tr>

           </thead>

        <tbody>

     <br><br>
     </tbody>
    </table>

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


<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>




@stop