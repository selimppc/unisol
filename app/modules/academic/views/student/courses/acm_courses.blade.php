
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
                                                <th>Course</th>
                                                <th>Credit</th>
                                                <th>GPA</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                               @if(isset($courses))
                                                      @foreach($courses as $value)
                                                          <tr>

                                                              <td>{{$value->relBatchCourse->relCourse->title}}</td>

                                                              <td></td>
                                                              <td></td>
                                                              <td></td>

                                                              <td>
                                                                   {{--<a href="{{ URL::to('admission/amw/batch-waiver/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#bwModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>--}}
                                                                   {{--<a class="btn btn-xs btn-default" href="{{ URL::to('admission/amw/batch-waiver/edit/'.$value->id) }}" data-toggle="modal" data-target="#bwModal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>--}}
                                                                   {{--<a data-href="{{ URL::to('admission/amw/batch-waiver/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>--}}
                                {{----}}
                                                              </td>
                                                          </tr>
                                                      @endforeach
                                                @endif

                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addPublications" >

                                </button><br>



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