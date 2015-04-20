
@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop

@section('content')

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="">

        <!-- Main content -->
        <section class="content">


            <!-- START CUSTOM TABS -->
            <h2 class="page-header">Courses</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Completed  </a></li>
                            <li><a href="#tab_2" data-toggle="tab">Running</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    Settings  <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                                    <li role="presentation" data-toggle="modal" data-target="#addResearchReview"><a role="menuitem" tabindex="-1" href="#"> Add Journal </a></li>
                                </ul>
                            </li>
                            <li class="pull-right" class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                                <ul class="dropdown-menu">
                                    <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Add Category </a></li>
                                    <li role="presentation" data-toggle="modal" data-target="#addResearchReview"><a role="menuitem" tabindex="-1" href="#"> Add Journal </a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                {{--<button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addResearchReview" >--}}

                                {{--</button>--}}
                                <br>
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>course</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addPublications" >
                                    Add Publication
                                </button><br>

                                <b>Publications:</b>

                                <div class="box-body table-responsive">
                                    <table id="example3" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Publication</th>
                                            <th>Description</th>
                                            <th>Category </th>
                                            <th>Resources</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>




                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->
                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->


            </div> <!-- /.row -->
            <!-- END CUSTOM TABS -->



        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


@stop