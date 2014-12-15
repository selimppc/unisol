




<fieldset>
            <!--    <div class='col-md-12' style="border: 1px red solid"> -->
                <div class="form-group">
                    {{ Form::label('department_id', 'DepartmentName') }}
                    {{ Form::select('department_id', [''=>'Select', '1'=>'BCSE', '2'=>'BBA', '3'=>'BSEE'],'', ['class'=>'form-control col-md-12']) }}
                </div>

               <div class='form-group'>
                    {{ Form::label('title', 'DegreeName') }}
                    {{ Form::text('title', Input::old('title'), array('class'=>'form-control','required'=>'required')) }}
                </div>

                <div class='form-group'>
                    {{ Form::label('description', 'Description') }} 
                    {{ Form::textarea('description', Input::old('description'),['class'=>'form-control','required'=>'required','size'=>'30x5']) }}
                </div>
             
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
            <button type="reset" class="btn">Cancel</button>
                  <!--   </div> -->
</fieldset>