<!-- View Details Modal -->
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="viewPublications"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">View Details</h4>
            </div>
            <div class="modal-body">
                <section class=content invoice">
                    <!-- title row -->
                    <div class=row">
                        <div class="col-xs-12">
                            <h2 class="page-header">
                                <i class="fa fa-globe"></i> Welcome to our Enrollment Page
                            </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">

                            <address>
                                <strong>Student Details</strong><br>
                                     Id :<strong> 011091022</strong><br>
                                     Year :<strong> 2013</strong><br>
                                     Semester : <strong>Fall</strong>
                            </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">

                            <address>
                                <strong>Payment Details</strong><br>
                                    Scholarship Type:<strong> Scholarship-25%</strong> <br>
                                    Payment Account Type : <strong>Online Bank Payment</strong> <br>
                                    Total Amount :<strong> 49,000 </strong><br>
                            </address>
                        </div>
                        <!-- /.col -->


                        <!-- Table row -->
                        <div class="row">
                            <div class="col-xs-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course Code</th>
                                        <th>Credit</th>
                                        <th>Per Credit Fee</th>
                                        <th>Total Amount</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Computer Architecture</td>
                                        <td>CSE-101</td>
                                        <td>3</td>
                                        <td>4500</td>
                                        <td>13500</td>

                                    </tr>
                                    <tr>
                                        <td>Computer Network</td>
                                        <td>CSE-003</td>
                                        <td>3</td>
                                        <td>4500</td>
                                        <td>13500</td>

                                    </tr>
                                    <tr>
                                        <td>Economics 2</td>
                                        <td>ECO-02</td>
                                        <td>3</td>
                                        <td>4500</td>
                                        <td>13500</td>

                                    </tr>
                                    <tr>
                                        <td>Physics 2</td>
                                        <td>PHY-02</td>
                                        <td>3</td>
                                        <td>4500</td>
                                        <td>13500</td>
                                    </tr>

                                    <tr>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"></td>
                                        <td class="highrow"><strong>Subtotal</strong></td>
                                        <td class="highrow">54000</td>
                                        <td class="highrow"></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                </section>
                <!-- /.content -->

                <div class="modal-footer">
                    <button class="btn btn-primary" data-dismiss="modal">Accept</button>
                    <button class="btn btn-success" data-toggle="modal" data-target="#declinecommentModal">
                        Decline
                    </button>

                    <button type="button" class="btn btn-success" data-dismiss="modal">Back</button>

                </div>

                </aside>
                <!-- /.right-side -->
            </div>
            <!-- ./wrapper -->
            <style>
                .height {
                    min-height: 200px;
                }

                .icon {
                    font-size: 47px;
                    color: #5CB85C;
                }

                .iconbig {
                    font-size: 77px;
                    color: #5CB85C;
                }

                .table > tbody > tr > .emptyrow {
                    border-top: none;
                }

                .table > thead > tr > .emptyrow {
                    border-bottom: none;
                }

                .table > tbody > tr > .highrow {
                    border-top: 3px solid;
                }
            </style>


        </div>


    </div>
    <!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Aprroval Modal -->
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Approval</h4>
            </div>
            <div class="modal-body">
                Are you gonna approve Payment ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Approve</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Decline with comment Modal -->
<div class="modal fade" id="declinecommentModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title">Reason for Decline</h4>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="description">Reason</label>
                    <textarea class="form-control" id="description" placeholder="Description goes here"></textarea>
                </div>


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