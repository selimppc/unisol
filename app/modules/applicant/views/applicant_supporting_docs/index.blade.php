@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="span9 well">
<table class="table table-striped table-bordered" id="myTable">

     <h4>Supporting  Documents</h4>


      {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/personal_info/edit/' . $applicant_personal_info->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>--}}
                    <thead>


                         <tr>
                            <td>Goal Statement</td>
                               {{--<td>{{$applicant_personal_info->fathers_name}}--}}
                               </td>
                          </tr>

                           <tr>
                              <td>Essay</td>
                                {{--<td>{{$applicant_personal_info->fathers_occupation}}--}}
                                </td>
                           </tr>

                           <tr>
                             <td>Letter of intent</td>
                               {{--<td>{{$applicant_personal_info->fathers_phone}}--}}
                               </td>
                           </tr>

                          <tr>
                            <td>Personal Statement</td>
                            {{--<td>{{$applicant_personal_info->mothers_name}}--}}
                          </td>
                         </tr>

                           <tr>
                             <td>Research Statement</td>
                               {{--<td>{{$applicant_personal_info->mothers_occupation}}--}}
                             </td>
                         </tr>

                         <tr>
                           <td>Portfolio</td>
                               {{--<td>{{$applicant_personal_info->mothers_phone}}--}}
                               </td>
                         </tr>

                         <tr>
                            <td>Resume</td>
                              {{--<td>{{$applicant_personal_info->passport}}--}}
                              </td>
                         </tr>

                         <tr>
                             <td>Readmission Personal Details</td>
                               {{--<td>{{$applicant_personal_info->national_id}}--}}
                               </td>
                          </tr>

                           <tr>
                              <td>Others</td>
                             {{--<td>{{$applicant_personal_info->national_id}}--}}
                               </td>
                           </tr>

           </thead>

        <tbody>

     <br><br>
     </tbody>
    </table>

</div>
{{-----------------------------------------Modals------------------------------------------------------------}}

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