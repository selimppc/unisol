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

                    <a href="{{ URL::route('create.book.transaction')}}" class=" btn btn-success fa fa-plus pull-right" data-toggle="modal" data-target="#myModal">Add New</a>
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
                                    <th>Department</th>
                                    <th>Book</th>
                                    <th>Lib Trn No</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Confirm</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sl = $book_transaction->getFrom(); ?>
                                @foreach ($book_transaction as $value)
                                    @unless($value->status =='cancel')
                                        <tr>
                                            <td class="sl-no-size">{{$sl++}}</td>
                                            <td class="b-text">{{ link_to_route($value->status=="purchase" ? 'book-transaction-financial' : 'transaction-book-view',$value->relUser->relUserProfile->first_name.' '.$value->relUser->relUserProfile->last_name,['id'=>$value->id], ['data-toggle'=>"modal",'data-target'=>"#createModal"]) }}</td>

                                            <td>{{isset($value->relUser->id)?$value->relUser->id:''}}</td>

                                            <td>{{isset($value->relUser->relDepartment->title)?$value->relUser->relDepartment->title:''}}</td>

                                            <td>{{isset($value->relLibBook->title)?$value->relLibBook->title:''}}</td>

                                            <td>{{isset($value->lib_trn_no)?$value->lib_trn_no:''}}</td>

                                            <td>{{date("d-m-Y", strtotime((isset($value->issue_date)) ? $value->issue_date : '') ) }}</td>

                                            @if($value->status !=='purchase')
                                                <td>{{date("d-m-Y", strtotime((isset($value->return_date)) ? $value->return_date : '') ) }}</td>
                                            @else
                                                <td></td>
                                            @endif

                                            <td>{{isset($value->total_amount)?$value->total_amount:''}}</td>

                                            <td>{{ucfirst($value->status)}}</td>

                                          {{--  @if( strtotime($value->return_date) < strtotime('now') )
                                                <td>{{'delay'}}</td>
                                            @else
                                                <td>{{ucfirst($value->status)}}</td>
                                            @endif--}}

                                            <td>
                                                @unless($value->status =='confirmed')
                                                <a href="{{ URL::route('transaction-book-view',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="bottom" title="View"><i class="fa fa-eye text-green"></i></a>

                                                <a href="{{ URL::route('transaction-book-edit',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil-square-o text-blue"></i></a>

                                                <a data-href="{{ URL::route('transaction-book-destroy', ['req_id'=>$value->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-power-off text-red" data-toggle="tooltip" data-placement="bottom" title="Cancel"></i></a>
                                                @endunless
                                            </td>
                                            <td>
                                                @if($value->status =='received')
                                                    <a data-href="{{ URL::route('transaction-financial-returned-status', ['id'=>$value->id ]) }}" class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-arrow-circle-right text-purple" data-toggle="tooltip" data-placement="bottom" title="Returned"></i> Returned</a>

                                                @elseif($value->status =='delay')
                                                    <a data-href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#createModal" href="" ><i class="fa fa-arrow-circle-left text-purple" data-toggle="tooltip" data-placement="bottom" title="Delay"></i> Delay</a>
                                                @endif
                                                @if($value->status =='purchase')
                                                <a data-href="{{ URL::route('book-transaction-financial-status', ['id'=>$value->id ]) }}" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-check-square-o text-white" data-toggle="tooltip" data-placement="bottom" title="Confirm"></i> Confirm</a>
                                                @endif
                                            </td>
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
        <div class="modal-dialog" style="z-index:1050">
            <div class="modal-content">

            </div>
        </div>
    </div>


    {{-- Modal for show --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" >
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{-- Modal for Edit --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" style="z-index:1050" >
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--  Modal for create billing details--}}
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog">
        <div class="modal-dialog ">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{-- Modal for cancel and confirm status --}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure!! Do You Want to Confirm It?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-danger danger">Ok</a>

                </div>
            </div>
        </div>
    </div>



@stop
