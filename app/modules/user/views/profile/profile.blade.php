@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
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
                                   <a href="{{Route('user/profile-info/profile-image',['id'=>$userProfile->id])}}"data-toggle="modal" data-target="#changeImageModal">Change Profile Picture</a>
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
                         @if($userProfile)
                            {{ HTML::image( "/user_images/profile/".$userProfile->image , 'User Image', ['class'=>'img-circle']) }}
                         @endif
                     </div>

                     <div class="col-lg-4">
                         @if(isset($userProfile))
                             <p>First Name : <b>{{$userProfile->first_name}}</b></p>
                             <p>Last Name : <b>{{$userProfile->last_name}}</b></p>
                             <p>Date of Birth : {{$userProfile->date_of_birth}}</p>
                             <p>Gender : {{$userProfile->gender}}</p>
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
                 @include('user::user_info.profile._modal')
            {{ Form::close() }}

             {{ Form::open(array('route' => 'user/meta-data/store','files'=>'true')) }}
                     @include('user::user_info.meta_data._modal')
             {{ Form::close() }}
            <section class="col-lg-12"style="background-color:#ffffff">
                <p>&nbsp;</p>
                <div class="col-lg-4"><b style="color: #000000">Biographical Information</b>
                <p>
                    @if(isset($userMeta))
                       <span class="text-muted ">You Can Add or Change Your Signature.
                           <a href="{{Route('user/meta-data/signature',['id'=>$userMeta->id])}}"data-toggle="modal" data-target="#changeImageModal">Add/Change Signature.</a>
                       </span>
                    @endif
                </p>
                </div>
                <div class="col-lg-8" style="background-color:aliceblue">

                   <table class="table table-striped  table-bordered">
                       @if(isset($userMeta))
                          <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/meta-data/edit',['id'=>$userMeta->id]) }}" data-toggle="modal" data-target="#myeditModal" >Edit Biographical Info</a>
                       @else
                          <button type="button" class="pull-right btn btn-sm btn-default" data-toggle="modal" data-target="#modal">
                              + Add Biographical Info
                          </button>
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
                                <td>{{ $userMeta->signature != null ? HTML::image('/user_images/docs/'.$userMeta->signature) :'Signature do not added yet.' }}</td>
                            </tr>
                       @else
                             {{"No Biographical Information found !"}}
                       @endif
                   </table>
                </div>
            </section>
            <p>&nbsp;</p>
            <hr>
    </div>

<!-- Modal  -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
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
     <!-- Modal : edit -->
     <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
         <div class="modal-dialog" style="z-index:1050">
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

