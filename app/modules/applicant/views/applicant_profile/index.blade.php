@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title text-purple">Applicant Proifle</h3>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                {{--@if($profile != null)--}}
                    {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/profile/edit/' . $profile->id  ) }}" data-toggle="modal" data-target="#myeditModal" >Edit Profile</a>--}}
                {{--@else--}}
                    {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/profile/create')}}" data-toggle="modal" data-target="#addModal" ></a>--}}

                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#addProfile" style="margin-bottom: 5px">Add Profile</button>
                {{--@endif--}}
                <tr>
                    <th>Date of Birth</th>
                    {{--<td >{{ $profile != null ? $profile->date_of_birth : null }}--}}
                    {{--</td>--}}
                </tr>
                <tr>
                    <th>Gender</th>
                    {{--<td>{{ $profile != null ? $profile->gender : null }}--}}
                    {{--</td>--}}
                </tr>
                <tr>
                    <th>Profile picture</th>
                    {{--@if($profile != null)--}}
                        {{--<td>{{ HTML::image('applicant_images/' .$profile->profile_image) }}--}}
                            {{--<a class=" btn btn-sm btn-info" href="{{ URL::to('applicant/profile_image/edit/' . $profile->id ) }}" data-toggle="modal" data-target="#changeImageModal" >changeImage...</a></td>--}}
                    {{--@endif--}}
                </tr>
                <tr>
                    <th>City</th>
                    {{--<td>{{$profile != null ? $profile->city: null}}--}}
                    {{--</td>--}}
                </tr>
                <tr>
                    <th>State</th>
                    {{--<td>{{$profile !=null ? $profile->state: null}}--}}
                    {{--</td>--}}
                </tr>
                <tr>
                    <th>Country</th>
                    {{--<td>{{$profile !=null ? $profile->city: null}}--}}
                    {{--</td>--}}
                </tr>
                <tr>
                    <th>Zip Code</th>
                    {{--<td>{{$profile !=null ? $profile->zip_code : null}}--}}
                    {{--</td>--}}
                </tr>
            </table>
        </div>
    </div>

    {{--<!-- Modal Create Profile -->--}}
    <div id="addProfile" class="modal fade"data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog lg" >
            <div class="modal-content">

                <div class="modal-body">
                    {{ Form::open(array('url' => 'applicant/profile/store', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                        @include('applicant::applicant_profile._form')
                    {{ Form::close() }}
                </div>

            </div>
        </div>
    </div>







    <!-- Modal : edit -->
    <div class="modal fade" id="myeditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h3 class="modal-title" id="myModalLabel"></h3>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    {{--modal: change image--}}

    <div class="modal fade" id="changeImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>--}}
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


@stop