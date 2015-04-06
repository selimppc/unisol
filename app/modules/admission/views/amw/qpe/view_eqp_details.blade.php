<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Question Evaluation Details</h4>
</div>

@include('admission::amw.qpe.style_file')

<div class="modal-body">
    <div class="row" style="padding: 3%">
        <div class="row">
            <div class="col-xs-6">
                <b>Subject Name</b> : {{$data->relBatchAdmtestSubject->relAdmtestSubject->title}}
            </div>
            <div class="col-xs-6">
                <b>Total Marks</b> : {{$data->total_marks}}
            </div>
        </div>


        <table>
            <tbody><br>
                <ol>
                    @foreach($question_item_details as $values)
                    <li><span> {{$values->relAdmQuestionItems->title}}</span></li>
                    <p style="margin-left: 6%; padding: 1%; background: #efefef;" >
                            answer goes here
                    </p>
                    @endforeach
                </ol>
            </tbody>
        </table>


    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>