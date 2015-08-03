@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_library')
@stop
@section('content')
    <h3 class="text-blue text-uppercase">Library Management</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Book Transaction</a></li>
                    <button type="button" class=" btn btn-success fa fa-plus pull-right" data-toggle="modal" data-target="#myModal" data-toggle="tooltip" data-placement="bottom" title="Add New" >
                        Add New
                    </button>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>User Name</th>
                                    <th>User Id</th>
                                    <th>Book</th>
                                    <th>Lib Trn No</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sl = $book_transaction->getFrom(); ?>
                                @foreach ($book_transaction as $value)
                                    @unless($value->status =='cancel')
                                        <tr>
                                            <td class="sl-no-size">{{$sl++}}</td>
                                            <td class="b-text">{{ link_to_route($value->status=="received" ? 'billing.details.applicant' : 'billing-applicant-view',$value->relUser->relUserProfile->first_name.' '.$value->relUser->relUserProfile->last_name,['id'=>$value->id], ['data-toggle'=>"modal",'data-target'=>"#createModal"]) }}</td>

                                            <td>{{isset($value->relUser->id)?$value->relUser->id:''}}</td>

                                            <td>{{isset($value->relLibBook->title)?$value->relLibBook->title:''}}</td>

                                            <td>{{isset($value->lib_trn_no)?$value->lib_trn_no:''}}</td>

                                            <td>{{isset($value->issue_date)?$value->issue_date:''}}</td>

                                            <td>{{isset($value->return_date)?$value->return_date:''}}</td>

                                            <td>{{isset($value->total_amount)?$value->total_amount:''}}</td>

                                            <td>{{ucfirst($value->status)}}</td>

                                            </td>
                                            <td></td>
                                       {{--     <td>
                                              --}}{{--  @if($value->status != 'confirmed')
                                                    <a data-href="{{ URL::route('status-billing-applicant-head-update', ['req_id'=>$value->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-check-square-o text-green" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i> Confirm</a>


                                                @endif--}}{{--
                                            </td>--}}
                                        </tr>
                                    @endunless
                                @endforeach
                                </tbody>
                            </table>
                            {{ $book_transaction->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- Modal add new  --}}
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title text-center text-purple">Book Transaction</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('route' => array('book-transaction-save')))}}
                    @include('library::librarian.book_transaction._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@stop
