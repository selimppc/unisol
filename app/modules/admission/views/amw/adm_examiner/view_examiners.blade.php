<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4>View Examiner "{{User::FullName($data->user_id)}}"</h4>
</div>

<div style="padding-left: 10px; width: 90%;">
    {{ Form::open(array('route'=>'admission.amw.admission-test-examiner.view-admission-test-examiner','method' => '')) }}
        <div class="span9 well" style="font-size: large; margin-left: 40px">
            <strong> Department: </strong> {{ $data->relBatch->relDegree->relDepartment->title }}
            <p>
                <strong> Degree: </strong>  {{ $data->relBatch->relDegree->title }} <br>
                <strong> Name of Faculty : </strong> {{User::FullName($data->user_id)}} <br>
                <strong> Status :</strong> <br>
                <strong> Comments :</strong> {{ $data->relBatch->relAdmExaminerComments->id }}<br>
                <div class="form-group">
                      {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                </div>
            </p>
        </div>
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
    &nbsp;
    </br>
    &nbsp;
    {{ Form::close() }}
</div>