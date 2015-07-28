@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <h3 class="text-blue text-uppercase">Fees :: Applicant</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Billing Applicant</a></li>
                    <button type="button" class=" btn btn-success fa fa-plus btn_margin" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="bottom" title="Add New" >
                        Add New
                    </button>

                    <a href="{{URL::route('applicant-billing-history')}}" class="btn btn-default fa fa-arrow-right text-light-blue btn-width">View Fees Details</a>


                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th>Applicant Name</th>
                                    <th>Applicant Id</th>
                                    <th>Schedule</th>
                                    <th>Total Cost</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Confirm</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sl=1;?>
                                @foreach ($summary_applicant as $value)
                                    @if($value->status !=='cancel')
                                    <tr>
                                       <td class="sl-no-size">{{$sl++}}</td>
                                       <td class="b-text">{{ link_to_route($value->status=="open" ? 'billing.details.applicant' : 'billing-applicant-view',$value->relApplicant->first_name.' '.$value->relApplicant->last_name,['id'=>$value->id], ['data-toggle'=>"modal",'data-target'=>"#createModal"]) }}</td>

                                        <td>{{isset($value->relApplicant->applicant_id)?$value->relApplicant->applicant_id:''}}</td>

                                        <td>{{isset($value->relBillingSchedule->title)?$value->relBillingSchedule->title:''}}</td>

                                        <td>{{isset($value->total_cost)?$value->total_cost:''}}</td>

                                        <td>{{ucfirst($value->status)}}
                                        </td>
                                        <td>
                                            @if($value->status=='open')
                                            <a href="{{ URL::route('billing-applicant-view',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye text-green"></i></a>

                                            <a href="{{ URL::route('billing-applicant-head-edit',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil-square-o text-blue"></i></a>

                                            <a data-href="{{ URL::route('applicant-head-destroy', ['req_id'=>$value->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-power-off text-red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>

                                            @elseif($value->status=='confirmed')
                                                <a href="{{ URL::route('billing-applicant-view',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye text-green"></i></a>

                                            @endif
                                        </td>
                                        <td>
                                            @if($value->status != 'confirmed')
                                                {{Form::open(array('route'=> ['billing-applicant-head-update']))}}
                                                {{ Form::hidden('id',$value->id) }}
                                                {{ Form::hidden('status','confirmed') }}
                                                {{ Form::submit('Confirm', array('class'=>'btn btn-xs btn-warning'))}}
                                                {{Form::close()}}

                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {{ $summary_applicant->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal add new  --}}
    <div id="myModal" class="modal fade">
        <div class="modal-dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title text-center text-purple">Billing Applicant</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('route' => array('save-billing-applicant-head')))}}
                    @include('fees::billing_summary.applicant._form_applicant')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for show --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{-- Modal for Edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

   {{--  Modal for create billing details--}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="showingModal">
        <div class="modal-dialog modal_ex_lg">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{-- Modal for cancel --}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Cancel</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to Cancel?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                    <a href="#" class="btn btn-danger danger">Cancel</a>

                </div>
            </div>
        </div>
    </div>
@stop
