@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">Applicant Account</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Applicant Account</a></li>
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
                        @if($account != null)
                            <a class="pull-right btn btn-sm btn-success" href="{{ URL::to('applicant/user-account/edit/' . $account->id ) }}" data-toggle="modal" data-target="#editModal" >Edit account</a>
                        @endif
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                <tr>
                                    <th>First Name:</th>
                                    <td>{{isset($account->first_name) ? $account->first_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Middle Name:</th>
                                    <td>{{isset($account->middle_name) ? $account->middle_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Last Name:</th>
                                    <td>{{isset($account->last_name) ? $account->last_name : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Email Address:</th>
                                    <td>{{isset($account->email) ? $account->email : ''}}</td>
                                </tr>
                                <tr>
                                    <th>User Name:</th>
                                    <td>{{isset($account->username) ? $account->username : ''}}</td>
                                </tr>
                                <tr>
                                    <th>Registered Date:</th>
                                    <td>{{isset($account->reg_date) ? $account->reg_date : ''}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal : edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>


@stop



