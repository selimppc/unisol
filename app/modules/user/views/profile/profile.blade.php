@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <!-- left column -->
    <div class="box box-solid">
        <div class="box-header" style="background-color: #0490a6">
           <h3 class="text-center text-green"><b style="color: #f5f5f5">User Profile</b></h3>
        </div>
        <section class="col-lg-12 connectedSortable"style="background-color:#ffffff">
            <section class="col-lg-4 connectedSortable">
                <p>&nbsp;</p>
                <h4><b style="color: #000000">Personal Information</b></h4>
                {{--<span class="text-muted ">You Can Change Your Profile Picture From Here .  <a href="{{Route('user/profile-info/profile-image',['id'=>$userProfile->id])}}"data-toggle="modal" data-target="#changeImageModal">Change Profile Picture</a></span>--}}
            </section>
            <div class="box box-solid">
                <section class="col-lg-8 connectedSortable pull-right">
                    <br>
                    <div class="box box-info">
                         <div class="box-body" style="padding: 30px;background-color:aliceblue">
                             <div class="col-lg-6 pull-left">
                                {{--{{ HTML::image( "/user_images/profile/".$userProfile->image , 'User Image', ['class'=>'img-circle']) }}--}}
                             </div>
                             <br>
                             <div class="col-lg-6 pull-right">
                                 @if(isset($userProfile))
                                     First Name : <b>{{$userProfile->first_name}} </b><br>
                                     Last Name : <b>{{$userProfile->last_name}}</b><br>
                                     Date of Birth : {{$userProfile->date_of_birth}}<br>
                                     Gender : {{$userProfile->gender}}<br>
                                     City : {{$userProfile->city}}<br>
                                     Zip Code : {{$userProfile->zip_code}}<br>
                                     Country : {{$userProfile->relCountry->title}}
                                 @else
                                     {{"No Profile data found !"}}
                                 @endif
                             </div>
                             <p>&nbsp;</p>
                             <div>
                                 {{--<a class="pull-right btn btn-sm btn-default" href="{{ URL::route('user/edit/profile-info',['id'=>$userProfile->id]) }}" data-toggle="modal" data-target="#modal" >Edit <i class="fa fa-arrow-circle-right"></i></a>--}}
                             </div>
                         </div>
                    </div>
                    <p>&nbsp;</p>
                    {{--New Entry--}}

                    <div class="box box-info">
                         <div class="box-body" style="padding: 30px;background-color:aliceblue">
                                 <br>
                                 <div class="col-lg-6 pull-right">
                                     @if(isset($userMeta))
                                         Father's Name : <b>{{isset($userMeta->fathers_name)?$userMeta->fathers_name:''}} </b><br>
                                         Mother's Name : <b>{{$userMeta->mothers_name}}</b><br>
                                         NID : {{$userMeta->national_id}}<br>
                                         Place of Birth : {{$userMeta->place_of_birth}}<br>
                                         Nationality : {{$userMeta->nationality}}<br>
                                     @else
                                         {{"No Meta data found !"}}
                                     @endif
                                 </div>
                             <p>&nbsp;</p>
                         </div>
                    </div>
                    <p>&nbsp;</p>
                </section>
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

