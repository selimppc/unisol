@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="span8 well">

<table class="table table-striped table-bordered" id="myTable">

     <h4>Applicant Miscellaneous Information </h4>
        @if($data != null)
            <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/miscellaneous_info/edit/' . $data->id  ) }}" data-toggle="modal" data-target="#myeditModal" >Edit </a>
        @else
            <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/miscellaneous_info/create')}}" data-toggle="modal" data-target="#addModal" >Add  Data</a>

        @endif
                    <thead>


                         <tr>
                            <th>Ever admit this university</th>
                               <td>@if($data != null)

                                 {{ $data->ever_admit_this_university ==1 ? 'Yes' : 'No' }}
                                 @else

                                @endif

                            </td>
                          </tr>

                          <tr>
                            <th>Ever dismiss</th>

                            <td>@if($data != null)

                             {{ $data->ever_dismiss ==1 ? 'Yes' : 'No' }}
                             @else

                            @endif

                          </td>
                         </tr>

                         <tr>
                             <th>Academic honors received</th>

                           <td>@if($data != null)

                            {{ $data->academic_honors_received ==1 ? 'Yes' : 'No' }}
                            @else

                           @endif
                             </td>
                          </tr>

                          <tr>
                               <th>Ever admit other university</th>

                             <td>@if($data != null)

                             {{ $data->ever_admit_other_university ==1 ? 'Yes' : 'No' }}
                             @else

                            @endif
                              </td>
                            </tr>

                          <tr>
                             <th>Admission test center</th>

                              <td>@if($data != null)

                              {{ $data->admission_test_center ==1 ? 'Yes' : 'No' }}
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