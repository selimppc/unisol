<div style="padding-left: 10px; width: 90%;">

 <h1>View View Examiners</h1>

    {{ Form::open(array('route'=>'admission.amw.admission-test-examiner.view-admission-test-examiner','method' => '')) }}


        <div class="span9 well" style="font-size: large; margin-left: 40px">

            <h2><strong>Department :</strong> </h2>

            <p>
                <strong> Degree :</strong>  <br>

                <strong> Name of Faculty :</strong>  <br>

                <strong> Status :</strong>  <br>

                <strong> Comments :</strong>  <br>

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