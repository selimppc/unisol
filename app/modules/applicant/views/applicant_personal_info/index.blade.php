@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">Personal Information</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab"> Personal Information</a></li>
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
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                @if($applicant_personal_info != null)
                                    <a class="pull-right btn btn-sm btn-success" href="{{ URL::to('apt/personal_info/edit/' . $applicant_personal_info->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit <i class="fa fa-arrow-circle-right"></i></a>
                                @else
                                    <button type="button" class="pull-right btn btn-sm btn-success" data-toggle="modal" data-target="#addModal" style="margin-bottom: 5px">Add <i class="fa fa-arrow-circle-right"></i></button>
                                @endif
                                <thead>
                                <tr>
                                    <td>Fathers Name</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->fathers_name : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Occupation</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->fathers_occupation : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->fathers_phone : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Is Freedom Fighter?</td>
                                    <td>
                                        {{ $applicant_personal_info['freedom_fighter']==1 ? 'Yes' : ''}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Mothers Name</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->mothers_name : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Occupation</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->mothers_occupation : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->mothers_phone : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>National id#</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->national_id : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Driving License#</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->driving_licence : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Passport#</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->passport : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Marital Status</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->marital_status : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->religion : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Present Address</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->present_address : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Permanent Address</td>
                                    <td>
                                        {{ $applicant_personal_info != null ? $applicant_personal_info->permanent_address : null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Signature</td>
                                    <td>
                                        @if($applicant_personal_info != null ? $applicant_personal_info->signature : null)
                                         <a class=" btn-link" href="{{ URL::to('applicant/personal_info_signature/edit/' . $applicant_personal_info->id ) }}" data-toggle="modal" data-target="#changeSignature" >
                                            {{ HTML::image('/applicant_images/app_meta/'.$applicant_personal_info->signature)}}
                                            Change Signature</a><br>
                                         @endif
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <br><br>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<!-- Modal add -->--}}
    <div id="addModal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog" >
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Personal Info</h4>
                </div>
                <div class="modal-body" >

                    {{ Form::open(array('url' => 'apt/personal_info/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                      @include('applicant::applicant_personal_info._form')
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>

    <!-- Modal : edit -->
    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--modal: change image--}}
    <div class="modal fade" id="changeSignature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

@stop