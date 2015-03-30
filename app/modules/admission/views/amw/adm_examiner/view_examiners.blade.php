<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h1>View View Examiners</h1>
</div>

<div style="padding-left: 10px; width: 90%;">



    {{ Form::open(array('route'=>'admission.amw.admission-test-examiner.view-admission-test-examiner','method' => '')) }}


        <div class="span9 well" style="font-size: large; margin-left: 40px">

            <h2><strong> Department: </strong> {{ $data }}</h2>

            <p>
                <strong> Degree: </strong>  <br>

                <strong> Name of Faculty :</strong> <br>

                <strong> Status :</strong> <br>  baki ace kichu kichu jinsih ekhane print kroa

                <strong> Comments :</strong> <br>

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