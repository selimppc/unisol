@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <h2 class="page-header text-purple tab-text-margin">Extra-Curricular Activities</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Extra-Curricular Activities</a></li>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <a class="pull-right btn btn-sm btn-success" href="" data-toggle="modal" data-target="#addModal" >Add Activities <i class="fa fa-arrow-circle-right"></i> </a>
                        <div class="box-body table-responsive ">
                            <table class="table table-striped  table-bordered">
                                <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Marks</th>
                                    <th>Duration</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                {{--@foreach ($datas as $value)--}}
                                    {{--<tr>--}}
                                        {{--<td>{{$value->title}}</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showOne" href=""><i class="fa fa-eye" style="color: green"></i></a>--}}

                                            {{--<a href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#myeditModal" href="" ><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>--}}

                                            {{--<a href="" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" ><i class="fa  fa-trash-o" style="color: red"></i></a>--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@stop