@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <h3 class="text-blue text-uppercase">Fees::Billing Item</h3>
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Billing Item</a></li>
                    <button type="button" class=" btn btn-success fa fa-plus btn_margin2" data-toggle="modal" data-target="#myModal" >
                        Add New
                    </button>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive ">
                            <table id="example" class="table table-bordered table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Initial</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sl=1;?>
                                @foreach ($billing_item as $value)
                                    <tr>
                                        <td class="sl-no-size">{{$sl++}}</td>
                                        <td>{{$value->title}}</td>
                                        <td>{{$value->description}}</td>
                                        <td>{{$value->initial}}</td>
                                        <td>
                                            <a href="{{ URL::route('item.edit', ['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#edit-modal"><i class="fa fa-pencil-square-o" style="color: #0044cc"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $billing_item->links() }}
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
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Billing Item</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('route' => array('item.save')))}}
                     @include('fees::billing_item._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for Edit --}}
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

@stop