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
        {{--<div class="box-header" style="background-color: #0490a6">--}}
           {{--<h3 class="text-center text-green"><b style="color: #f5f5f5">User Profile</b></h3>--}}
        {{--</div>--}}
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
                          <a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/edit/profile-info',['id'=>$userProfile->id]) }}" data-toggle="modal" data-target="#myeditModal"><i class="fa fa-arrow-circle-right"></i> <b>Edit</b> </a>
                     @else
                         <button type="button" class="pull-right btn btn-sm btn-default" data-toggle="modal" data-target="#modal">
                          <b>+ Add </b>
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

