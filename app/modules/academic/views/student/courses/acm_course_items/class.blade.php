@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop
@section('content')

<div class="wrapper row-offcanvas row-offcanvas-left">
       <!-- Main content -->
        <section class="content">
            <!-- START CUSTOM TABS -->
            <h2 class="page-header">Research Management</h2>
            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Papers  </a></li>
                            <li><a href="#tab_2" data-toggle="tab">Publication</a></li>
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
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addResearchReview" >
                                    Add Papers
                                </button><br>

                                <b>Paper:</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Category</th>
                                                <th>Documents</th>
                                                <th>Resources</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                <tr>
                                                    <td> Renewal: The Ultimate Gift </td>
                                                    <td> Consistently ranked the most highly-cited and pertinent publications in the field </td>
                                                    <td> Science  </td>
                                                    <td>
                                                    <span data-toggle="modal" data-target="#viewDetails">
                                                        <img src="../img/doc.png" width="50px" style="cursor: pointer">
                                                    </span>
                                                    </td>
                                                    <td> IEEE links </td>
                                                    <td> Approved </td>
                                                    <td>
                                                        <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                            View
                                                        </button>
                                                    </td>
                                                </tr>


                                      
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
</div><!-- ./wrapper -->

@stop
