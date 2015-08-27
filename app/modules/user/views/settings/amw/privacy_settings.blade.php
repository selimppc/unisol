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
           <h3 class="text-center text-green"><b style="color: #f5f5f5">Accounts & Settings</b></h3>
        </div>
            <section class="col-lg-12"style="background-color:#ffffff">
                <div class="col-lg-2" style="font-size: 12px">
                     @if(isset($userProfile))
                        {{ $userProfile->image != null ? HTML::image('/uploads/user_images/profile/'.$userProfile->image , 'User Image') :  HTML::image('/img/default.jpg', 'User Image') }}
                        <p>&nbsp;</p>
                        <a href="{{Route('user/profile-info/profile-image',['id'=>$userProfile->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Change Profile Picture</ins></a>
                       @else
                        {{HTML::image('/img/default.jpg', 'User Image')}}
                        {{--<a href="{{Route('user/profile-info/profile-image',['id'=>$userProfile->id])}}"data-toggle="modal" data-target="#changeImageModal"> <ins>Add Profile Picture</ins></a>--}}
                     @endif
                </div>
                <div class="col-lg-3">
                     <p>&nbsp;</p>
                         @if(isset($userAccounts))
                             <p>User Name : <b>{{$userAccounts->username}}</b></p>
                             <p>Password : <a href="{{Route('user/reset_password',['id'=>$userAccounts->id])}}"data-toggle="modal" data-target="#myeditModal">Change Password</a></p>
                             <p>Email Address : {{$userAccounts->email}}</p>
                         @else
                             {{"No data found !"}}
                         @endif
                     <p>&nbsp;</p>
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