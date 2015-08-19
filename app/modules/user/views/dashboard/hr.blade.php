@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop

@section('sidebar')
 @include('layouts._sidebar_hr')
@stop

@section('content')


<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-7 connectedSortable">

    <!-- quick email widget -->
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-envelope"></i>
            <h3 class="box-title">Quick Email</h3>
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div><!-- /. tools -->
        </div>
        <div class="box-body">
            <form action="#" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" placeholder="Subject"/>
                </div>
                <div>
                    <textarea class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </form>
        </div>
        <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
        </div>
    </div>

</section><!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-5 connectedSortable">

    <!-- Map box -->
    <div class="box box-solid bg-light-blue-gradient">
        <div class="box-header">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->

            <i class="fa fa-map-marker"></i>
            <h3 class="box-title">
                Visitors
            </h3>
        </div>
        <div class="box-body">
            <div id="world-map" style="height: 250px;"></div>
        </div><!-- /.box-body-->
        <div class="box-footer no-border">
            <div class="row">
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-1"></div>
                    <div class="knob-label">Visitors</div>
                </div><!-- ./col -->
                <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                   <div id="sparkline-2"></div>
                    <div class="knob-label">Online</div>
                </div><!-- ./col -->
                <div class="col-xs-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="knob-label">Exists</div>
                </div><!-- ./col -->
            </div><!-- /.row -->
        </div>
    </div>
    <!-- /.box -->

</section><!-- right col -->
</div><!-- /.row (main row) -->

@stop