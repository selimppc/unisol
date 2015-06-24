@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-purple ">Fees::Billing Installment</h3>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="col-sm-8">
        {{Form::open(array('route'=> ['installment.setup']))}}
        <div class="col-sm-3">
            {{ Form::label('degree_id', 'Degree') }}
            {{ Form::select('degree_id',$degree,Input::old('degree_id'), array('class' => 'form-control') ) }}
        </div>
        <div class="col-sm-2" style="padding-top: 1%">
            </br>
            {{ Form::submit('Filter', array('class'=>'btn btn-primary  btn-xs','id'=>'button'))}}
        </div>
        {{Form::close()}}
    <div class="col-sm-2" style="padding-top: 1%;margin-right: 5%">
        </br>
        <button type="button" class=" btn btn-xs btn-success fa fa-plus " data-toggle="modal" data-target="#addInstallment" >Add Installment</button>
    </div>
    </div>




    <div class="box-body table-responsive ">
        <table id="example" class="table table-bordered table-hover table-striped">
            <thead>
            <th>Schedule</th>
            <th>Item</th>
            <th>Cost</th>
            <th>Deadline</th>
            <th>Fined Cost</th>
            <th>Action</th>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $value)
                    <tr>
                        <td>{{isset($value->relBillingSchedule->title) ? $value->relBillingSchedule->title:''}}</td>

                        <td>{{isset($value->relBillingItem->title) ? $value->relBillingItem->title: ''}}</td>

                        <td>{{isset($value->cost) ? $value->cost : ''}}</td>

                        <td>{{date("d-m-Y", strtotime((isset($value->deadline)) ? $value->deadline : '') ) }}</td>

                        <td>{{isset($value->fined_cost) ? $value->fined_cost : ''}}</td>

                        <td>
                            <a href="{{ URL::route('installment.setup.view',['id'=>$value->id])}}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><i class="fa fa-eye" style="color: green"></i></a>
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>

    {{-- Modal add Installment --}}
    <div id="addInstallment" class="modal fade">
        <div class="modal-dialog" aria-hidden="true" data-keyboard="false" data-backdrop="static">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">{{HTML::image('assets/icon/media-close-btn.png')}}</button>
                    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Create Book Author</h4>
                </div>
                <div class="modal-body">
                    {{Form::open(array('route' => array('installment.setup.create')))}}
                    @include('fees::installment_setup.add_installment')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    {{-- Modal for show --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>

    {{--Ajax operation: depandable dropdown with loading gif--}}

    <script>
        $(function(){
            $('.loaderClass').hide();
            $('#batch_name').change(function(){
                $('.loaderClass').show();
                $.get("{{ url('fees/billing/drop-down-batch')}}",
                        { degree: $(this).val() },
                        function(data) {
                            $('.loaderClass').hide();
                            var model = $('#dependable-list');
                            model.empty();
                            $.each(data, function(key, element) {
                                model.append("<option value='"+ key +"'>" + element + "</option>");
                            });
                        });
            });
        });

    </script>

@stop