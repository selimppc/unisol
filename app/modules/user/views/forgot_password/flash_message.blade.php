@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6"  style="margin-left: 15%">
                <div class="box box-warning">
                    <div class="box-body">
                        <p></p>
                            <div class="text">
                                Password Reset Confirmation Sent!
                            </div>
                            <p>&nbsp;</p>
                            <p class="text-center"><b>We emailed you a link and instructions for updating your password.</b></p>
                            <p class="text-center"><b>After one hour, the link to update your password will expire.</b></p>
                            <p><a class="pull-right btn btn-sm btn-default" href="{{URL::route('user/login')}}">Continue to Login</a></p>
                            <p>&nbsp;</p>
                    </div>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
@stop