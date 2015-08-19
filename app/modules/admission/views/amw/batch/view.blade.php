<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h1> View Batch </h1>
</div>

<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">


        <div class="row">
            <h2><strong> Batch Number :</strong>{{ $batch->batch_number }}</h2>
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Degree:</strong></td>
                    <td>{{ $batch->relVDegree->title}}</td>
                </tr>
                <tr>
                    <td><strong> Year:</strong></td>
                    <td>{{ $batch->relYear->title }}</td>
                </tr>
                <tr>
                    <td><strong> Semester:</strong></td>
                    <td>{{ $batch->relSemester->title }}</td>
                </tr>
                <tr>
                    <td><strong> Description:</strong></td>
                    <td>{{ $batch->description }}</td>
                </tr>
                <tr>
                    <td><strong> Total Seat:</strong></td>
                    <td>{{ $batch->seat_total }}</td>
                </tr>
                <tr>
                    <td><strong> Start Date:</strong></td>
                    <td>{{ $batch->start_date }}</td>
                </tr>
                <tr>
                    <td><strong> End Date:</strong></td>
                    <td>{{ $batch->end_date }}</td>
                </tr>
                <tr>
                    <td><strong> Admission Deadline:</strong></td>
                    <td>{{ $batch->admission_deadline }}</td>
                </tr>
                <tr>
                    <td><strong> Admission Test Date:</strong></td>
                    <td>{{ $batch->admtest_date }}</td>
                </tr>
                <tr>
                    <td><strong> Admission Test Start Time:</strong></td>
                    <td>{{ $batch->admtest_start_time }}</td>
                </tr>

            </table>

        </div>

        <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

        &nbsp;
        </br>
        &nbsp;

    </div>

</div>
