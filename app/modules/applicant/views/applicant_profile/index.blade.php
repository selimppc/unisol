@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">Applicant Profile</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Applicant Proifle</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> </a></li>
                        </ul>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @if($profile != null)
                            <a class="pull-right btn btn-sm btn-success" href="{{ URL::to('applicant/profile/edit/' . $profile->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit Profile <i class="fa fa-arrow-circle-right"></i></a>
                        @else
                            <button type="button" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#addProfile" style="margin-bottom: 5px">Add Profile <i class="fa fa-arrow-circle-right"></i></button>
                        @endif
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                <tr>
                                    <th>Picture</th>
                                    @if($profile != null)
                                        <td><a class=" btn-link" href="{{ URL::to('applicant/profile_image/edit/' . $profile->id ) }}" data-toggle="modal" data-target="#changeImageModal" >
                                                {{ HTML::image('/applicant_images/profile/'.$profile->profile_image, $profile->profile_image,['class'=>'col-md-3'])}}
                                                Change Picture.</a><br></td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>{{isset($profile->date_of_birth) ? $profile->date_of_birth : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Birth Place</th>
                                    <td>{{isset($profile->place_of_birth) ? $profile->place_of_birth : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{isset($profile->gender) ? $profile->gender : ''}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{isset($profile->city) ? $profile->city : ''}}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{isset($profile->state) ? $profile->state : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{isset($profile->city) ? $profile->city : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Zip Code</th>
                                    <td>{{isset($profile->zip_code) ? $profile->zip_code : ''}}</td>
                                </tr> <tr>
                                    <th>Phone#</th>
                                    <td>{{isset($profile->phone) ? $profile->phone : ''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<!-- Modal Create Profile -->--}}
    <div id="addProfile" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-body" >
                    {{ Form::open(array('url' => 'applicant/profile/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    @include('applicant::applicant_profile._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal : edit -->
    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--modal: change image--}}
    <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>


@stop



