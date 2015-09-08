@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @if($user_role=="amw")
       @include('layouts._sidebar_amw')
    @elseif($user_role=="faculty")
       @include('layouts._sidebar_faculty')
    @elseif($user_role=="student")
       @include('layouts._sidebar_student')
    @elseif($user_role=="hr")
       @include('layouts._sidebar_hr')
    @elseif($user_role=="librarian")
       @include('layouts._sidebar_librarian')
    @elseif($user_role=="cfo")
       @include('layouts._sidebar_cfo')
    @endif
@stop
@section('content')
    <!-- left column -->
    <div class="background-color">
            {{----------------------User : Miscellaneous Information ------------------------------------------------------------}}
            <section class="col-lg-12 background-color">
                <p>&nbsp;</p>
                    <div class="col-lg-3"><b class="color-text-black">Miscellaneous Information</b>
                    </div>
                    <div class="col-lg-9 div-background-color">
                       @if($misc_info != null)
                           <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/misc-info/edit',['id'=>$misc_info->id]) }}" data-toggle="modal" data-target="#addModal"> Edit </a>
                       @else
                           <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/misc-info/create')}}" data-toggle="modal" data-target="#addModal" >+ Add</a>
                       @endif
                       <table class="table table-striped  table-bordered">
                            <tr>
                                <th>Ever Admit this University?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->ever_admit_this_university ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ever Dismiss?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->ever_dismiss ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Academic Honors Received?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->academic_honors_received ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Ever Admit other University?</th>
                                <td>@if($misc_info != null)
                                        {{ $misc_info->ever_admit_other_university ==1 ? 'Yes' : 'No' }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Admission test Center</th>
                                <td>
                                    @if($misc_info != null)
                                        {{ $misc_info->admission_test_center  }}
                                    @else
                                    @endif
                                </td>
                            </tr>
                       </table>
                    </div>
            </section>
            <p>&nbsp;</p>
            <hr>
    </div>
<!-- Modal  -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        </div>
    </div>
 </div>
      <!-- Modal : edit -->
     <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" style="z-index:1050">
             <div class="modal-content">

             </div>
         </div>
     </div>
     <!-- Modal for delete -->
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
      <!-- Modal : add misc info -->
      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
            </div>
         </div>
      </div>

     <style>
     hr {
         display: block;
         margin-top: 0.5em;
         margin-bottom: 0.5em;
         margin-left: auto;
         margin-right: auto;
         border-style: inset;
         border-width: 1px;
     }
     </style>



@stop

