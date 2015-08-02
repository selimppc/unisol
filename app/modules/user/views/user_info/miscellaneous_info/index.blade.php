@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">User Miscellaneous Information </h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Applicant Miscellaneous Information </a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                       @if($data != null)
                           <a class="pull-right btn btn-sm btn-success" href="{{ URL::route('user/misc-info/edit',['id'=>$data->id]) }}" data-toggle="modal" data-target="#myeditModal" >Edit Profile <i class="fa fa-arrow-circle-right"></i></a>
                       @else
                           <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                             + Add Miscellaneous Info
                           </button>
                       @endif
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                <tr >
                                    <th style="font-size: small">Ever Admit this University?</th>
                                    <td>@if($data != null)
                                            {{ $data->ever_admit_this_university ==1 ? 'Yes' : 'No' }}
                                        @else
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="font-size: small">Ever Dismiss?</th>
                                    <td>@if($data != null)
                                            {{ $data->ever_dismiss ==1 ? 'Yes' : 'No' }}
                                        @else
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="font-size: small">Academic Honors Received?</th>
                                    <td>@if($data != null)
                                            {{ $data->academic_honors_received ==1 ? 'Yes' : 'No' }}
                                        @else
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="font-size: small">Ever Admit other University?</th>
                                    <td>@if($data != null)
                                            {{ $data->ever_admit_other_university ==1 ? 'Yes' : 'No' }}
                                        @else
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="font-size: small">Admission test Center?</th>
                                    <td>@if($data != null)
                                            {{ $data->admission_test_center  }}
                                        @else
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::open(array('route' => 'user/misc-info/store','files'=>'true')) }}
         @include('user::user_info.miscellaneous_info._modal._modal')
    {{ Form::close() }}

    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

@stop