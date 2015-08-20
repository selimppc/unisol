@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <!-- left column -->
    <div class="row">
        <div class="box-header" style="background-color: #0490a6">
           <h3 class="text-center text-green"><b style="color: #f5f5f5">User Profile</b></h3>
        </div>
            <section class="col-lg-12"style="background-color:#ffffff">
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
                     <p>&nbsp;</p>
                     <div class="col-lg-4">
                        {{ HTML::image( "/user_images/profile/".$userProfile->image , 'User Image', ['class'=>'img-circle']) }}
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
    </div>

<!-- Modal  -->
 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
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
@stop

