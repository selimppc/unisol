<!-- Manage Lab -->
<div class="modal fade" id="manageLab" tabindex="-1" role="dialog" aria-labelledby="addPublications"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Manage Lab</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                    </div>


                    <div class="form-group">
                        <label>Deadline:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" placeholder="dd/mm/yy" />
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- Distribute Lab -->
<div class="modal fade" id="distributeLab" tabindex="-1" role="dialog" aria-labelledby="addPublications"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Manage Lab</h4>
            </div>
            <div class="modal-body">



                <b>Lab:</b>

                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Lab Title</th>
                            <th>File</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td> Online Taxi Cab Management in Java</td>
                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                            </td>
                            <td width="130">
                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#assignlabToONE">
                                    Assign to only ONE
                                </button>


                                <button class="btn btn-danger btn-xs" >
                                    Assin to ALL
                                </button>
                            </td>
                        </tr>


                        <tr>
                            <td> Unicode, Box2D</td>
                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                            </td>
                            <td width="130">
                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#assignlabToONE">
                                    Assign to only ONE
                                </button>


                                <button class="btn btn-danger btn-xs" >
                                    Assin to ALL
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td> Boot process, X-window concepts, Bash scripts, Linux world</td>
                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                            </td>
                            <td width="130">
                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#assignlabToONE">
                                    Assign to only ONE
                                </button>


                                <button class="btn btn-danger btn-xs" >
                                    Assin to ALL
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td> Particle Image Velocimetry</td>
                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                            </td>
                            <td width="130">
                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#assignlabToONE">
                                    Assign to only ONE
                                </button>


                                <button class="btn btn-danger btn-xs" >
                                    Assin to ALL
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>Synthesis of Alum from Scrap Aluminum</td>
                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                            </td>
                            <td width="130">
                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#assignlabToONE">
                                    Assign to only ONE
                                </button>


                                <button class="btn btn-danger btn-xs" >
                                    Assin to ALL
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td>  Java Programming</td>
                            <td>
                                            <span data-toggle="modal" data-target="#viewDetails">
                                                <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                                     class="img-thumbnail">
                                            </span>
                            </td>
                            <td width="130">
                                <button class="btn btn-primary btn-xs" data-toggle="modal"
                                        data-target="#assignlabToONE">
                                    Assign to only ONE
                                </button>


                                <button class="btn btn-danger btn-xs" >
                                    Assin to ALL
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Assign lab to ONE -->
<div class="modal fade" id="assignlabToONE" tabindex="-1" role="dialog" aria-labelledby="addPublications"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Assign Lab to ONE</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="title">Student Name</label>
                        <textarea class="form-control" id="title" placeholder="Type Here"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Publish</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Evaluate labs-->
<div class="modal fade" id="evaluateLab" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Lab Evaluation</h4>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group">
                        <label for="title">Report Presentation Related Files</label><br>
                        <span data-toggle="modal" data-target="#viewDetails">
                           <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                class="img-thumbnail">
                        </span>
                        <div class="form-group">
                            <label for="title">Marks</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="title">Report Presentation Related Files</label><br>
                        <span data-toggle="modal" data-target="#viewDetails">
                           <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                class="img-thumbnail">
                        </span>
                        <div class="form-group">
                            <label for="title">Marks</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="title">Report Presentation Related Files</label><br>
                        <span data-toggle="modal" data-target="#viewDetails">
                           <img src="../img/doc.png" width="100px" style="cursor: pointer"
                                class="img-thumbnail">
                        </span>
                        <div class="form-group">
                            <label for="title">Marks</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">BAck</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Delete Modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Delete </h4>
            </div>
            <div class="modal-body">
                Are you sure to delete this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Confirm</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- submitConfirmation Modal -->
<div class="modal fade" id="submitConfirmation" tabindex="-1" role="dialog" aria-labelledby="submitConfirmation"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Submit Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure to submit this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- submitConfirmation Modal -->
<div class="modal fade" id="denyConfirmation" tabindex="-1" role="dialog" aria-labelledby="submitConfirmation"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Deny Proposal</h4>
            </div>
            <div class="modal-body">
                Are you sure to Deny this item ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->



<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewDetails" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">


                <p>
                    <img src="../img/doc.png">
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Add Research Review Modal -->
<div class="modal fade" id="evaluationLabMarks" tabindex="-1" role="dialog" aria-labelledby="addResearchReview"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Labs Items Marks</h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="title">Lab Proposal</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>

                    <div class="form-group">
                        <label for="title">Proposal Presentation</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>

                    <div class="form-group">
                        <label for="title">Attendance</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>

                    <div class="form-group">
                        <label for="title">Fieldwork</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>

                    <div class="form-group">
                        <label for="title">Lab Presentation</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>

                    <div class="form-group">
                        <label for="title">Report Presentation</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>

                    <div class="form-group">
                        <label for="title">Manage Lab</label>
                        <input type="text" class="form-control" id="title" placeholder="Enter Marks">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->

