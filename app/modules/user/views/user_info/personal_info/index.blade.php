@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">User Profile</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">User Profile</a></li>
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
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#">  </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @if(isset($model))
                            <a class="pull-right btn btn-sm btn-success" href="{{ URL::route('user/edit/profile-info',['id'=>$model->id]) }}" data-toggle="modal" data-target="#myeditModal" >Edit Profile <i class="fa fa-arrow-circle-right"></i></a>
                        @else
                            <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                              + Add Profile
                            </button>
                        @endif
                        <div class="box-body table-responsive">
                            <table class="table table-striped  table-bordered">
                                <tr>
                                    <th>Profile Picture</th>
                                       <td>
                                       @if(isset($model->image))
                                           @if($model->image == null)
                                              <a class=" btn-link" href="{{ URL::route('user/profile-info/profile-image',['id'=>$model->id])}}" data-toggle="modal" data-target="#changeImageModal">
                                                {{ $model->image != null ? HTML::image('user_images/profile/'.$model->image, $model->image):""}}
                                                <ins>Add Your Profile Picture</ins>
                                              </a>
                                              @else
                                              {{ $model->image != null ? HTML::image('user_images/profile/'.$model->image, $model->image):""}}
                                           @endif
                                        @endif
                                       </td>
                                </tr>
                                <tr>
                                    <th>First Name</th>
                                    <td>{{isset($model->first_name) ? $model->first_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Middle Name</th>
                                    <td>{{isset($model->middle_name) ? $model->middle_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Last Name</th>
                                    <td>{{isset($model->last_name) ? $model->last_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Date of Birth</th>
                                    <td>{{isset($model->date_of_birth) ? $model->date_of_birth : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{isset($model->gender) ? $model->gender : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{isset($model->country) ? $model->relCountry->title :" "}}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{isset($model->city) ? $model->city : ''}}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{isset($model->state) ? $model->state : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Zip Code</th>
                                    <td>{{isset($model->zip_code) ? $model->zip_code : ''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ Form::open(array('route' => 'user/profile-info/store','files'=>'true')) }}
         @include('user::user_info.profile._modal')
    {{ Form::close() }}

    <!-- Modal : edit -->
    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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



