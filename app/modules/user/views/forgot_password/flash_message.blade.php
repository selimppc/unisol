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
                                Session Expired! You can Not Access To This link.
                            </div>
                            <p>&nbsp;</p>
                            <p class="text-center"><b>To Get A New Password Reset Link,You May Go : <a href='{{ URL::route('user/forgot-password')}}'><ins>Forgot Password</ins></a></b></p>
                            <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop