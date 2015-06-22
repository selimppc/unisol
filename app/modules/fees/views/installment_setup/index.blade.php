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
                {{Form::open(array('route'=> ['billing.setup.batch.delete'], 'class'=>'form-horizontal','files'=>true))}}
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
                        {{ Form::select('schedule_id', $schedule, Input::old('schedule_id'), ['class' => 'form-control','required'=>'required']) }}
                    </div>
                    <div class="col-sm-3">
                        {{ Form::label('item_id', 'Item') }}<span class="text-danger">*</span>
                        {{ Form::select('item_id', $item, Input::old('item_id'), ['class' => 'form-control','required'=>'required']) }}
                    </div>
                    <div class="col-sm-2">
                        {{ Form::label('no_installment', 'No of Installment') }}
                        {{Form::selectRange('no_installment', 0, 50,['class' => 'form-control','required'=>'required'])}}
                    </div>
                    <div class="col-sm-2 btn-style2">
                        {{ Form::submit('Proceed',['class'=>'btn btn-xs btn-success']) }}
                    </div>
                </div>
                {{ Form::close() }}
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