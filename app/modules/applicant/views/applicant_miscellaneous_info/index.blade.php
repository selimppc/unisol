@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="well well-lg">

<table class="table table-striped table-bordered" id="myTable">
<col width="150">
<col width="80">

     <h4 style="font-size: large">Applicant Miscellaneous Information </h4>
        @if($data != null)
            <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/miscellaneous_info/edit/' . $data->id  ) }}" data-toggle="modal" data-target="#myeditModal" >Edit </a>
        @else
            <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/miscellaneous_info/create')}}" data-toggle="modal" data-target="#addModal" >Add  Data</a>

        @endif
                    <thead>

                         <tr >
                            <th style="font-size: small">Ever Admit this University</th>
                               <td>@if($data != null)

                                 {{ $data->ever_admit_this_university ==1 ? 'Yes' : 'No' }}
                                 @else

                                @endif

                            </td>
                          </tr>

                          <tr>
                            <th style="font-size: small">Ever Dismiss</th>

                            <td>@if($data != null)

                             {{ $data->ever_dismiss ==1 ? 'Yes' : 'No' }}
                             @else

                            @endif

                          </td>
                         </tr>

                         <tr>
                             <th style="font-size: small">Academic Honors Received</th>

                           <td>@if($data != null)

                            {{ $data->academic_honors_received ==1 ? 'Yes' : 'No' }}
                            @else

                           @endif
                             </td>
                          </tr>

                          <tr>
                               <th style="font-size: small">Ever Admit other University</th>

                             <td>@if($data != null)

                             {{ $data->ever_admit_other_university ==1 ? 'Yes' : 'No' }}
                             @else

                            @endif
                              </td>
                            </tr>

                          <tr>
                             <th style="font-size: small">Admission test Center</th>

                              <td>@if($data != null)

                              {{ $data->admission_test_center  }}
                              @else

                             @endif
                               </td>
                         </tr>

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