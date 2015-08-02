@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">User Biographical Information</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">User Biographical Information</a></li>
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
                        @if($meta_data != null)
                            <a class="pull-right btn btn-sm btn-success" href="{{ URL::route('user/meta-data/edit',['id'=>$meta_data->id]) }}" data-toggle="modal" data-target="#myeditModal" >Edit Biographical <i class="fa fa-arrow-circle-right"></i></a>
                        @else
                            <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                              + Add Biographical Info
                            </button>
                        @endif

                        <div class="box-body table-responsive">
                            <table class="table table-striped  table-bordered">

                                <tr>
                                    <th>Father's Name</th>
                                    <td>{{isset($meta_data->fathers_name) ? $meta_data->fathers_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Name</th>
                                    <td>{{isset($meta_data->mothers_name) ? $meta_data->mothers_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Father's Occupation</th>
                                    <td>{{isset($meta_data->fathers_occupation) ? $meta_data->fathers_occupation : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Occupation</th>
                                    <td>{{isset($meta_data->mothers_occupation) ? $meta_data->mothers_occupation : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Father's Phone</th>
                                    <td>{{isset($meta_data->fathers_phone) ? $meta_data->fathers_phone : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Mother's Phone</th>
                                    <td>{{isset($meta_data->mothers_phone) ? $meta_data->mothers_phone:''}}</td>
                                </tr>
                                <tr>
                                    <th>Is Freedom Fighter ?</th>
                                    <td>{{isset($meta_data->freedom_fighter) ? $meta_data['freedom_fighter']==1 ? 'Yes' : 'No':''}}</td>
                                </tr>
                                <tr>
                                    <th>National ID#</th>
                                    <td>{{isset($meta_data->national_id) ? $meta_data->national_id : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Driving license#</th>
                                    <td>{{isset($meta_data->driving_licence) ? $meta_data->driving_licence : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Passport</th>
                                    <td>{{isset($meta_data->passport) ? $meta_data->passport : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Place Of Birth</th>
                                    <td>{{isset($meta_data->place_of_birth) ? $meta_data->place_of_birth : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Marital status</th>
                                    <td>{{isset($meta_data->marital_status) ? $meta_data->marital_status : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Nationality</th>
                                    <td>{{isset($meta_data->nationality) ? $meta_data->nationality : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Religion</th>
                                    <td>{{isset($meta_data->religion) ? $meta_data->religion : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Present Address</th>
                                    <td>{{isset($meta_data->present_address) ? $meta_data->present_address : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Permanent Address</th>
                                    <td>{{isset($meta_data->permanent_address) ? $meta_data->permanent_address : ''}}</td>
                                </tr>
                                <tr>
                                    <th class="col-lg-6">Signature</th>
                                    <td class="etsb-image-doc">{{ isset($meta_data->signature)? $meta_data->signature != null ? HTML::image('/applicant_images/app_meta/'.$meta_data->signature) :'Signature do not added yet.' :''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{ Form::open(array('route' => 'user/meta-data/store','files'=>'true')) }}
         @include('user::user_info.meta_data._modal')
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



