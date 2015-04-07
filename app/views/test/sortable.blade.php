@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                    <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                    <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                    <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                </ul>
            </div><!-- /.nav-tabs-custom -->

            <!-- Chat box -->
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-comments-o"></i>
                    <h3 class="box-title">Chat</h3>
                    <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                        <div class="btn-group" data-toggle="btn-toggle" >
                            <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                        </div>
                    </div>
                </div>

            </div><!-- /.box (chat box) -->

            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">To Do List</h3>
                    <div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div><!-- /.box-header -->
            </div><!-- /.box -->

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

            </div>

        </section><!-- /.Left col -->

    </div><!-- /.row (main row) -->



    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
      Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                            </ul>
                        </div><!-- /.nav-tabs-custom -->

                        <!-- Chat box -->
                        <div class="box box-success">
                            <div class="box-header">
                                <i class="fa fa-comments-o"></i>
                                <h3 class="box-title">Chat</h3>
                                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                    <div class="btn-group" data-toggle="btn-toggle" >
                                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box (chat box) -->

                        <!-- TO DO List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>
                                <h3 class="box-title">To Do List</h3>
                                <div class="box-tools pull-right">
                                    <ul class="pagination pagination-sm inline">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box-header -->
                        </div><!-- /.box -->

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

                        </div>

                    </section><!-- /.Left col -->

                </div><!-- /.row (main row) -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <?php $created_at = '2015-10-10 10:10:10'; ?>
    {{ $created_at->format('M j, Y'); }}
@stop

