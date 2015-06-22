@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
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
                                <br>
                                {{ Form::submit('Proceed', ['class'=>'btn btn-xs btn-success ','onClick'=>'showForm()']) }}
                            </div>
                        </div>
                {{ Form::close() }}
                    <div class="box-body table-responsive ">
                        <div id="viewTable" style="visibility: hidden;">
                            <table class="table table-bordered small-header-table" >
                                <thead>
                                <th>Amount</th>
                                <th>Fined Cost</th>
                                <th>Deadline</th>
                                </thead>
                                <tbody>
                                <td><input type="text" name="amount" class="amount"/></td>
                                <td><input type="text" name="fined_cost" class="fined_cost"/></td>
                                <td>{{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date_picker','required'=>'required']) }}</td>
                                </tbody>
                            </table>
                            <div class="btn-style2">
                                {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
                            </div>
                    </div>

            </div>
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

        /*To show form when click on proceed button*/

        function showForm(){
            document.getElementById("viewTable").style.visibility='visible';
        }

    </script>

@stop