@extends('layouts._master')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
  @include('academic::theoryclass.class.sidebar')
@stop
@section('content')


 <!-- START CUSTOM TABS -->

            <div class="row">
                <div class="col-md-12">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Class  </a></li>


                            <li class="pull-right" class="dropdown">

                                  <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#addClass" >
                                     Add Class
                                 </button><br>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <button class="pull-right btn btn-success btn-sm"  data-toggle="modal" data-target="#newClassVideo" >
                                    New Sesion Video
                                </button><br>
                                <b>&nbsp;</b>

                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>  </th>
                                            <th>  </th>
                                            <th>   </th>
                                            <th>  </th>
                                            <th>  </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>  </td>
                                                <td>  </td>
                                                <td>
                                                    {{--<span data-toggle="modal" data-target="#viewDetails">--}}
                                                        {{--<img src="" width="40" style="cursor: pointer" class="img-thumbnail">--}}
                                                    {{--</span>--}}
                                                </td>
                                                <td>  </td>
                                                <td width="120">
                                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#viewDetails">
                                                        View
                                                    </button>
                                                    <button class="btn btn-success btn-xs" data-toggle="modal" data-target="#newClassVideo">
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>


                                        </tbody>

                                    </table>
                                </div><!-- /.box -->
                            </div><!-- /.tab-pane -->

                        </div><!-- /.tab-content -->
                    </div><!-- nav-tabs-custom -->
                </div><!-- /.col -->


            </div> <!-- /.row -->
            <!-- END CUSTOM TABS -->




   {{----------------------------------------------}}
   {{--All modal for class index.blade.php--}}
   {{------------------------------------------------}}


<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Delete </h4>
            </div>
            <div class="modal-body">
                Are you sure to delete this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Approval</h4>
      </div>
      <div class="modal-body">
        Are you gonna approve this publication ?
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Theory Class : Day 2</h4>
            </div>
            <div class="modal-body">
                <h2> Theory Class : Day 2 </h2>
                <p>
                    <iframe width="560" height="315" src="//www.youtube.com/embed/qY173FCff_c" frameborder="0" allowfullscreen></iframe>
                </p>
                <p><b><a href="../video/class.zip">Download</a> </b></p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<!-- Add Class Video Modal -->
<div class="modal fade" id="newClassVideo" tabindex="-1" role="dialog" aria-labelledby="newClassVideo" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">New Class Video</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Class Name</label>
                        <input type="text" class="form-control" id="title" placeholder="Class Name">
                    </div>

                    <div class="form-group">
                        <label for="day">Day</label>
                        <input type="text" class="form-control" id="day" placeholder="Enter day">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputFile">Video input</label>
                        <input type="file" id="exampleInputFile" multiple="multiple">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->







<!-- Add Category Modal -->
<div class="modal fade" id="addClass" tabindex="-1" role="dialog" aria-labelledby="addClass" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Class</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Class Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Scholarship Modal -->
<div class="modal fade" id="addScholarship" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Scholarship Item</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Scholarship Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>


                    <div class="form-group">
                        <label for="status">Status </label>
                        <select class="form-control" id="status">
                            <option>Open</option>
                            <option>Close</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



@stop