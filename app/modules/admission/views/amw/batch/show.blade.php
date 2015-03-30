<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h1> View Batch </h1>
</div>

<div style="padding-left: 8%; width: 90%;">
<div class="modal-body">


        <div class="row">
            <h2><strong> Batch Number :</strong>{{ $b_m_course->batch_number }}</h2>
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Degree:</strong></td>
                    <td>{{ $b_m_course->relDegree->title }}</td>
                </tr>
                <tr>
                    <td><strong> Year:</strong></td>
                    <td>{{ $b_m_course->relYear->title }}</td>
                </tr>
                <tr>
                    <td><strong> Semester:</strong></td>
                    <td>{{ $b_m_course->relSemester->title }}</td>
                </tr>
                <tr>
                    <td><strong> Description:</strong></td>
                    <td>{{ $b_m_course->description }}</td>
                </tr>
                <tr>
                    <td><strong> Total Seat:</strong></td>
                    <td>{{ $b_m_course->seat_total }}</td>
                </tr>
                <tr>
                    <td><strong> Start Date:</strong></td>
                    <td>{{ $b_m_course->start_date }}</td>
                </tr>
                <tr>
                    <td><strong> End Date:</strong></td>
                    <td>{{ $b_m_course->end_date }}</td>
                </tr>
                <tr>
                    <td><strong> Admission Deadline:</strong></td>
                    <td>{{ $b_m_course->admission_deadline }}</td>
                </tr>
                <tr>
                    <td><strong> Admission Test Date:</strong></td>
                    <td>{{ $b_m_course->admtest_date }}</td>
                </tr>
                <tr>
                    <td><strong> Admission Test Start Time:</strong></td>
                    <td>{{ $b_m_course->admtest_start_time }}</td>
                </tr>

            </table>

        </div>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

</div>

</div>
