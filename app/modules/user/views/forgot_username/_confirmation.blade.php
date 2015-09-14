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
                                UserName Reminder !
                            </div>
                            <p>&nbsp;</p>
                            <p class="text-center"><strong>We've Send UserName to Your Email Address.Please Check Your Email.</strong></p>
                            <p class="text-center"><strong>Please check your spam folder if the email doesn’t appear within a few minutes.</strong></p>
                            <p class="text-center"><b><em>Thank You.</em></b></p>
                            <p><a class="pull-right btn btn-sm btn-default" href="{{URL::route('user/login')}}"><b>Continue to Login</b></a></p>
                            <p>&nbsp;</p>
                    </div>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
@stop