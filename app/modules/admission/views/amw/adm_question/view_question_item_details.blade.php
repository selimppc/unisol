<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>View Question Item and Details </h3>
</div>

<div style="margin-left: 5%; padding: 10px; width: 90%;">
         <div class="span9 well" style="font-size: large; margin-left: 10px">
                 <strong> Question Paper:</strong> &nbsp &nbsp {{ $faculty_ViewQuestionItems->relAdmQuestion->title }}
                 </br>
                 <strong> Title:</strong> &nbsp &nbsp {{ $faculty_ViewQuestionItems->title }}
                 </br>
                 <strong> Marks:</strong> &nbsp &nbsp {{ $faculty_ViewQuestionItems->marks }}
                 </br></br>
                 <div class="container">
                   <div class="row">
                        @if($faculty_ViewQuestionItems->question_type == 'radio')
                            <div class="row">
                               @foreach($options as $op)
                                  <div class="col-sm-12">
                                       <div class="col-sm-6">
                                           <div class="col-sm-4">

                                                   {{ Form::radio('checkbox', '') }}
                                                   {{ $op->title }}
                                           </div>
                                           <div class="col-sm-2">
                                                 @if($op->answer == 1)
                                                   {{ Form::checkbox('checkbox', '',array('checked')) }}<br>
                                                 @endif
                                           </div>
                                       </div>
                                  </div>
                               @endforeach
                            </div>
                        @elseif($faculty_ViewQuestionItems->question_type == 'checkbox')
                                <div class="row">
                                   @foreach($options as $op)
                                      <div class="col-sm-12">
                                           <div class="col-sm-6">
                                               <div class="col-sm-4">
                                                    {{ Form::checkbox('checkbox', '') }}
                                                    {{$op->title}}
                                               </div>
                                               <div class="col-sm-2">
                                                     @if($op->answer == 1)
                                                       {{Form::checkbox('checkbox', '',array('checked'))}}<br>
                                                     @endif
                                               </div>
                                           </div>
                                      </div>
                                   @endforeach
                                </div>
                        @else
                               <div style="text-align: justify" class="text-center">
                                    {{ Form::textarea('desc', 'Write Your Answer', ['size' => '50x7']) }}
                                </div>
                        @endif
                   </div>
                 </div>
         </div>
        <a href="{{URL::previous()}}" class="pull-right btn btn-default">Close </a>

        </br></br>
</div>

