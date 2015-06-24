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
                {{Form::open(array('route' => array('installment.setup.create')))}}
                <div class="col-sm-12" style="background: #EEEEEE">
                    <div class="col-sm-2">
                        {{ Form::label('degprog_id', 'Degree Name') }}<span class="text-danger">*</span>
                        {{ Form::select('degprog_id',$degree, Input::old('degprog_id'), ['id'=>'batch_name','class'=>'form-control','required'=>'required'] ) }}
                    </div>
                    <div class="col-sm-2">
                        {{ Form::label('batch_id', 'Batch') }}<span class="text-danger">*</span>
                        <span class="loaderClass">{{HTML::image('assets/icon/ajax-loader.gif')}}</span>
                        {{ Form::select('batch_id', $batch, Input::old('batch_id'), ['id'=>'dependable-list', 'class'=>'form-control','required'=>'required']) }}
                    </div>
                    <div class="col-sm-3">
                        {{ Form::label('schedule_id','Schedule') }}
                        <span class="text-danger">*</span>
                        {{ Form::select('schedule_id',$schedule, Input::old('schedule_id'), ['class' => 'form-control','required'=>'required']) }}

                    </div>
                    <div class="col-sm-3">
                        {{ Form::label('item_id', 'Item') }}<span class="text-danger">*</span>
                        {{ Form::select('item_id', $item, Input::old('item_id'), ['class' => 'form-control','required'=>'required']) }}
                    </div>
                    <div class="col-sm-2">
                        {{ Form::label('no_installment', 'No of Installment') }}
                        {{Form::selectRange('no_installment', 1, 48,'', ['class' => 'form-control','required'=>'required'])}}
                    </div>
                    <div>&nbsp;</div>
                    <div class="col-sm-2 btn-style2">
                        {{ Form::submit('Proceed',['class'=>'btn btn-xs btn-success']) }}
                    </div>
                </div>
                <div class="col-sm-12 panel-style">
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <br>
    <br>
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
            @if(isset($installment_setup))
                @foreach($installment_setup as $value)
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
        {{ $installment_setup->links() }}
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