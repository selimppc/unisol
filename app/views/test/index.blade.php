@extends('layouts.layout')

@section('sidebar')
    @include('layouts._sidebar_layout')
@stop

@section('content')
   <h1>Welcome Home! </h1>
   <p style="color: green">hello...90909</p>
   {{Form::select('size', array('L' => 'Large', 'S' => 'Small'));}}

   {{ Form::text('title', null, ['data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Tooltip on left']) }}

<div>
    <h3>Date Picker</h3>
    <div class="widget-main">
        <div class="row-fluid">
            <label for="id-date-picker-1">Date Picker</label>
        </div>

        <div class="control-group">
            <div class="row-fluid input-append">
                {{Form::text('date', Input::old('date'), ['class'=>'form-control date-picker'])}}
                <span class="add-on">
                    <i class="icon-calendar"></i>
                </span>
            </div>
        </div>


    </div>
</div>


<script type="text/javascript">
    $(function() {
        $('.date-picker').datepicker().next().on(ace.click_event, function(){
            $(this).prev().focus();
        });
    });
</script>
@stop