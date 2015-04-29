@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop
@section('content')

<section class="col-lg-12 connectedSortable">
    <!-- Map box -->
    <div class="box box-solid bg-gray">
        <div class="box-header">
            <!-- tools box -->
            <div class="pull-right box-tools">
                <button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i class="fa fa-calendar"></i></button>
                <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
            </div><!-- /. tools -->

            <i class="fa fa-map-marker"></i>
            <h3 class="box-title">
                Course
            </h3>
        </div>
        <div class="box-body">
            <div id="world-map" style="height: 250px;">
                Hello
            </div>
        </div><!-- /.box-body-->
    </div>
    <!-- /.box -->
</section><!-- right col -->


@stop