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
            {{----------------------User : Academic Records ------------------------------------------------------------}}
        <section class="col-lg-12 background-color">
            <div class="col-lg-4"><b class="color-text-black">Academic Information</b>
            <p>
                @if(isset($academicRecords))
                   <span class="text-muted">
                       {{--<a href="{{Route('user/meta-data/signature',['id'=>$academicRecords->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Signature. </ins></a>--}}
                   </span>
                @endif
            </p>
            </div>
            <div class="col-lg-8 div-background-color">
                <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/acm-records/create')}}" data-toggle="modal" data-target="#meta-modal" ><b>+ Add</b></a>
                <p>
                  <em><span class="text-danger">*</span><strong style="color:darkmagenta"> Please add at least two academic records.</strong></em>
                </p>
                <table class="table table-striped  table-bordered">
                    <thead>
                         <tr>
                             <th> Education Level</th>
                             <th>Board / University</th>
                             <th>Passing Year</th>
                             <th>Result</th>
                             <th>Docs</th>
                             <th>Action</th>
                         </tr>
                   </thead>
                   <tbody>
                      @if(isset($academicRecords))
                          @foreach($academicRecords as $value)
                              <tr>
                                   <td>{{strtoupper($value->level_of_education)}}</td>
                                   <td>{{ $value->board_university}}</td>
                                   <td>{{ $value->year_of_passing}}</td>
                                   <td>
                                        @if($value->result_type =='division')
                                        {{ $value->result }}
                                        @else
                                        {{$value->gpa}}
                                        @endif
                                   </td>
                                   <td>
                                      <a style="color:navy" class="btn btn-xs btn-default" href="{{URL::route('user/acm-records/certificate',['id'=>$value->id])}}" data-toggle="modal" data-target="#changeImageModal">Certificate</a>
                                      <a style="color:navy" class="pull-right btn btn-xs btn-default" href="{{URL::route('user/acm-records/transcript',['id'=>$value->id])}}" data-toggle="modal" data-target="#changeImageModal">Transcript</a>
                                   </td>
                                   <td>
                                       <a href="{{ URL::route('user/acm-records/edit',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myeditModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-edit"></span></a>
                                       <a data-href="{{ URL::route('user/acm-records/delete',['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                   </td>
                              </tr>
                          @endforeach
                      @else
                          {{"No Academic Records found !"}}
                      @endif
                   </tbody>
                </table>
            </div>
        </section>
        <p>&nbsp;</p>
        <hr>
    </div>

{{--Meta data:Modal --}}

<div class="modal fade" id="meta-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">

        </div>
    </div>
</div>

<!-- Modal  -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="z-index:1050">
        <div class="modal-content">

        </div>
    </div>
 </div>

 {{--modal: change image--}}
     <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog">
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

