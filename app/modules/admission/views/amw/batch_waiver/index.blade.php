@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <a class="pull-right btn btn-sm btn-success" href="{{ URL::to('admission/amw/batch-management' )}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    <div class="box box-solid ">
        <div class="box box-info">
            <div class="box-header">
                <h3 class="box-title">Batch Waiver </h3>

                <div class="box-tools pull-right">
                    <a class="pull-right btn btn-sm btn-info" href="{{ URL::route('admission.amw.batch-waiver.create',['batch_id'=>$batch_info->id])}}" data-toggle="modal" data-target="#WaiverModal" style="color: #ffffff"><b>Add Waiver..</b></a>
                </div>
                <p>&nbsp;</p>

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <table id="example" class="table table-bordered table-striped">
                            {{--@if (!$batch_info == null)--}}

                            <tr>
                                <th>  Title :</th>
                                <td>{{ $batch_info->relDegree->relDegreeProgram->title.' '.$batch_info->relDegree->relDegreeGroup->title }}</td>
                            </tr>

                            <tr>
                                <th> Department:</th>
                                <td>{{ $batch_info->relDegree->relDepartment->title }}</td>
                            </tr>

                            <tr>
                                <th> Year:</th>
                                <td>{{ $batch_info->relYear->title }}</td>
                            </tr>

                            <tr>
                                <th> Semester:</th>
                                <td>{{ $batch_info->relSemester->title }}</td>

                            </tr>

                            <tr>
                                <th>Duration:</th>
                                <td>{{ $batch_info->duration }}</td>

                            </tr>

                            <tr>
                                <th>Total Credit :</th>
                                <td>{{ $batch_info->total_credit }}</td>

                            </tr>


                            {{--@else--}}

                                {{--<div class="col-xs-12" style="text-align: center;">--}}

                                    {{--No data found !--}}
                                    {{--<span class="btn btn-xs btn btn-info" style="color: #e02222;">{{ HTML::linkAction('UserSignupController@admBatchWaiverIndex' ,'Go Back'  ) }}</span>--}}

                                {{--</div>--}}
                            {{--@endif--}}
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{--{{ $model->links() }}--}}
    </div>
{{----------------------------------------------Modal : Batch Waiver Modal--------------------------------------------------------------------------}}
    <div class="modal fade" id="WaiverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>



@stop