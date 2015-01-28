<div style="padding: 10px; width: 90%;">


             <h3>Welcome to View Question Items: Amw </h3> </br>


             {{ Form::open(array('route'=>'prepare_question_paper.amw_ViewQuestionItems','method' => '')) }}

                     <div class="jumbotron text-center">

                         <p>
                             <strong> Title:</strong> &nbsp &nbsp &nbsp &nbsp {{ $amw_ViewQuestionItems->title }}
                             </br></br>




                               <?php
                               if($amw_ViewQuestionItems->question_type == 'radio'){
                                    ?><div><?php

                                             foreach($options as $op){
                                                  ?><input type="radio" id="id<?=$op->id?>" name="options"><?php
                                                  echo ($op->title)."<br>" ;


                                     ?></div><?php

                                     ?><div><?php


                                              if($op->answer == '1'){
                                                  ?><input type="checkbox" id="" name="answer" checked><?php
                                              }

                                     ?></div><?php
                                  }







                               }else if($amw_ViewQuestionItems->question_type == 'checkbox'){

                                   foreach($options as $op){
                                       ?><input type="checkbox" id="id<?=$op->id?>" name="options"><?php
                                       echo($op->title)."<br>";

                                       if($op->answer == '1'){
                                             ?><input type="checkbox" id="" name="answer" checked><?php
                                       }

                                   }
                               }
                               else{

                                   ?>
                                   {{ Form::textarea('desc', 'Write Your Answer', ['size' => '40x8']) }}

                                  <?php
                               }

                              ?>












                              </br>


                         </p>
                     </div>

                     <a href="{{URL::to('prepare_question_paper/amw_QuestionList')}}" class="btn btn-default">Close </a>

             {{ Form::close() }}

</div>
