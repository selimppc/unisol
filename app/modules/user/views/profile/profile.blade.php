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
    <div style="background-color:#ffffff">
        <div class="box-header" style="background-color: #0490a6">
           <h3 class="text-center text-green"><b style="color: #f5f5f5">User Profile</b></h3>
        </div>
            <section class="col-lg-12"style="background-color:#ffffff">
            <p>&nbsp;</p>
                <div class="col-lg-4"><b style="color: #000000">Personal Information</b>
                     <p>
                         @if(isset($userProfile))
                              <span class="text-muted ">You Can Change Your Profile Picture From Here .
                                   <a href="{{Route('user/profile-info/profile-image',['id'=>$userProfile->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Change Profile Picture </ins></a>
                              </span>
                         @endif
                     </p>
                </div>
                <div class="col-lg-8" style="background-color:aliceblue">
                     @if(isset($userProfile))
                          <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/edit/profile-info',['id'=>$userProfile->id]) }}" data-toggle="modal" data-target="#myeditModal">Edit Personal Info</a>
                     @else
                         <button type="button" class="pull-right btn btn-sm btn-default" data-toggle="modal" data-target="#modal">
                           + Add Personal Info
                         </button>
                     @endif
                     <p>&nbsp;</p>
                     <div class="col-lg-4">
                         @if(isset($userProfile))
                            {{ $userProfile->image != null ? HTML::image('/uploads/user_images/profile/'.$userProfile->image , 'User Image', ['class'=>'img-circle']) :  HTML::image('/img/default.jpg', 'User Image') }}
                            <p>&nbsp;</p>
                            <a href="{{Route('user/profile-info/profile-image',['id'=>$userProfile->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Profile Picture</ins></a>
                         @endif
                     </div>

                     <div class="col-lg-4">
                         @if(isset($userProfile))
                             <p>First Name : <b>{{$userProfile->first_name}}</b></p>
                             <p>Last Name : <b>{{$userProfile->last_name}}</b></p>
                             <p>Date of Birth : {{$userProfile->date_of_birth}}</p>
                             <p>Gender : {{ucfirst($userProfile->gender)}}</p>
                             <p>City : {{$userProfile->city}}</p>
                             <p>Zip Code : {{$userProfile->zip_code}}</p>
                             <p>Country : {{$userProfile->country}}</p>
                         @else
                             {{"No Profile data found !"}}
                         @endif
                         <p>&nbsp;</p>
                     </div>
                </div>
            </section>
            <p>&nbsp;</p>
            <hr>
            {{ Form::open(array('route' => 'user/profile-info/store','files'=>'true')) }}
                 @include('user::user_info.personal_info._modal')
            {{ Form::close() }}

            <section class="col-lg-12"style="background-color:#ffffff">
                <p>&nbsp;</p>
                <div class="col-lg-4"><b style="color: #000000">Biographical Information</b>
                <p>
                    @if(isset($userMeta))
                       <span class="text-muted ">You Can Change Your Signature From Here.
                           <a href="{{Route('user/meta-data/signature',['id'=>$userMeta->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Signature. </ins></a>
                       </span>
                    @endif
                </p>
                </div>
                <div class="col-lg-8" style="background-color:aliceblue">

                   <table class="table table-striped  table-bordered">
                       @if(isset($userMeta))
                          <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/meta-data/edit',['id'=>$userMeta->id]) }}" data-toggle="modal" data-target="#myeditModal" >Edit Biographical Info</a>
                       @else
                         <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/meta-data/create')}}" data-toggle="modal" data-target="#meta-modal" >+ Add Biographical Info</a>
                       @endif
                       <p>&nbsp;</p>
                       @if(isset($userMeta))
                            <tr>
                                <th >Father's Name</th>
                                <td>{{$userMeta->fathers_name}}</td>
                            </tr>

                            <tr>
                                <th >Father's Occupation</th>
                                <td>{{$userMeta->fathers_occupation}}</td>
                            </tr>

                            <tr>
                                <th >Is Freedom Fighter?</th>
                                <td>{{$userMeta['freedom_fighter']==1 ? 'Yes' : 'No'}}</td>
                            </tr>

                            <tr>
                                <th>Father's Phone</th>
                                <td>{{$userMeta->fathers_phone}}</td>
                            </tr>

                            <tr>
                                <th>Mother's Name</th>
                                <td>{{$userMeta->mothers_name}}</td>
                            </tr>

                            <tr>
                                <th >Mother's Occupation</th>
                                <td>{{$userMeta->mothers_occupation}}</td>
                            </tr>

                            <tr>
                                <th>Mother's Phone</th>
                                <td>{{$userMeta->mothers_phone}}</td>
                            </tr>

                            <tr>
                                <th>Marital Status</th>
                                <td>
                                   {{strtoupper($userMeta->marital_status)}}
                                </td>
                            </tr>

                            <tr>
                                <th>Religion</th>
                                <td>{{$userMeta->religion}}</td>
                            </tr>

                            <tr>
                                <th>Present Address</th>
                                <td>{{$userMeta->present_address}}</td>
                            </tr>

                            <tr>
                                <th>Permanent Address</th>
                                <td>{{$userMeta->permanent_address}}</td>
                            </tr>
                            <tr>
                                <th>Signature</th>
                                <td>
                                    {{ $userMeta->signature != null ? HTML::image('/uploads/user_images/docs/'.$userMeta->signature) : HTML::image('/img/default_sig.png', 'Signature') }}<br>
                                    <a href="{{Route('user/meta-data/signature',['id'=>$userMeta->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Signature.</ins></a>
                                </td>
                            </tr>
                       @else
                             {{"No Biographical Information found !"}}
                       @endif
                   </table>
                </div>
            </section>
            <p>&nbsp;</p>
            <hr>
            {{ Form::open(array('route' => 'user/meta-data/store','files'=>'true')) }}
               @include('user::user_info.meta_data._modal')
            {{ Form::close() }}

            {{----------------------User : Academic Records ------------------------------------------------------------}}
            <section class="col-lg-12"style="background-color:#ffffff">
                <p>&nbsp;</p>
                    <div class="col-lg-4"><b style="color: #000000">Academic Information</b>
                    <p>
                        @if(isset($academicRecords))
                           <span class="text-muted">
                               {{--<a href="{{Route('user/meta-data/signature',['id'=>$academicRecords->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add/Change Signature. </ins></a>--}}
                           </span>
                        @endif
                    </p>
                    </div>
                    <div class="col-lg-8" style="background-color:aliceblue">
                        <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/acm-records/create')}}" data-toggle="modal" data-target="#meta-modal" >+ Add Academic Records</a>
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

     {{--Meta data:Modal --}}

     <div class="modal fade" id="meta-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-lg" style="z-index:1050">
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

