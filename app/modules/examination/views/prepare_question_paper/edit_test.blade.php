{{--{{$qid}}--}}


<h4 style="padding: 20px">Add Question Item for <b>{{$qid->title}} </b></h4>

{{ Form::open(array('url' => 'prepare_question_paper/faculty_store_Question_Items', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

    {{Form::hidden('qid', $qid->id, ['class'=>'form-control'])}}

        <fieldset style="padding: 10px; width: 90%; padding: 20px">

                        <div class='form-group'>
                            {{ Form::label('title', 'Question Title') }}
                            {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required'=>'required']) }}
                        </div>

                        <div class="form-group">
                           {{ Form::label('marks', 'Marks') }}
                           {{ Form::text('marks', Input::old('marks'), array('class' => 'form-control','required'=>'required')) }}
                        </div>


                        <div class="form-group" id="myRadioGroup">
                               {{ Form::label('gender','Question Type') }}

                               {{ Form::label('mcq','MCQ',array('class'=>'radio-inline')) }}
                               {{ Form::radio('mcq', 'MCQ', array('id'=>'mcq', 'class'=>'radio')) }}

                               {{ Form::label('mcq','Descriptive',array('class'=>'radio-inline')) }}
                               {{ Form::radio('mcq', 'Descriptive', array('id'=>'mcq', 'class'=>'radio')) }}

                        </div>




                        <div id="MCQ" class="descriptive">


                                <div class="form-group">

                                            {{ Form::label('gender','Answer Type') }}

                                            {{ Form::label('mcq','Single Answer', array('class'=>'radio-inline')) }}
                                            {{ Form::radio('question_type', 'mcq_single', array('id'=>'single', 'class'=>'radio')) }}


                                            {{ Form::label('mcq','Multiple Answer', array('class'=>'radio-inline')) }}
                                            {{ Form::radio('question_type', 'mcq_multiple', array('id'=>'multiple', 'class'=>'radio')) }}

                                </div>


                                          <div id="myRadioGroup">


                                                <div id="mcq_single" class="desc">

                                                        <div id="fields">

                                                                         {{ Form::label('Option 1:') }}
                                                                         {{ Form::text('option_title[]', '', array('id'=>'option1','class' => 'option_class')) }}
                                                                         {{ Form::radio('answer[]', 0 ) }}

                                                        </div>

                                                        <div id="fields1">
                                                                         {{ Form::label('Option 2:') }}
                                                                         {{ Form::text('option_title[]', '', array('id'=>'option2','class' => 'option_class')) }}
                                                                         {{ Form::radio('answer[]', 1) }}
                                                        </div>



                                                         <div id="fields">
                                                         </div>

                                                         <a onclick="createInput()" class="add_button">Add (+)</a>

                                                </div>
                                                <div id="mcq_multiple" class="desc">

                                                            <div id="fields">

                                                                             {{ Form::label('Option 1:') }}
                                                                             {{ Form::text('option_title[]', '', array('id'=>'option1','class' => 'option_class')) }}
                                                                             {{ Form::checkbox('answer[]', 0 ) }}

                                                            </div>

                                                            <div id="fields1">
                                                                             {{ Form::label('Option 2:') }}
                                                                             {{ Form::text('option_title[]', '', array('id'=>'option2','class' => 'option_class')) }}
                                                                             {{ Form::checkbox('answer[]', 1) }}
                                                            </div>



                                                             <div id="fields">
                                                             </div>

                                                             <a onclick="createInput()" class="add_button">Add (+)</a>




                                                </div>
                                          </div>


















                                 <div id="Descriptive" class="descriptive">
                                 </div>
                        </div>

                       </br></br></br>



                    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

                      <a href="{{URL::to('prepare_question_paper/faculty_index')}}" class="btn btn-default">Close </a>

        </fieldset>

{{ Form::close() }}

<script>
    $(function() {

        $(document).ready(function(){
            $("input[name='mcq']").click(function() {

                var test = $(this).val();
                $(".descriptive").hide();
                $("#"+test).show();
            });
        });


            $("input[name='question_type']").click(function() {

                var test = $(this).val();
                $(".desc").hide();
                $("#"+test).show();
            });

    });

    
</script>





