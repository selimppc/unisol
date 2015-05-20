
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 style="text-align: center;"><span style="color: seagreen">View Question Item : {{ $question_item->title }}</span></h4>
</div>

<div style="margin-left: 5%; padding: 10px; width: 90%;">
     <p>&nbsp;</p>

     <table id="" class="table table-bordered table-hover table-striped" style="font-size: medium">
        <tr>
           <th class="col-lg-6">Question Paper :</th>
           <td>{{isset($question_item->relExmQuestion->title) ? $question_item->relExmQuestion->title : '' }}</td>
        </tr>
        <tr>
           <th class="col-lg-6">Question(Title) :</th>
           <td>{{isset($question_item->title) ? $question_item->title : '' }}</td>
        </tr>
        <tr>
           <th class="col-lg-6">Marks :</th>
           <td>{{isset($question_item->marks) ? $question_item->marks : '' }}</td>
        </tr>
     </table>
        <div class="container">
            <div class="row">
                @if($question_item->question_type == 'radio')
                    <strong>{{ $question_item->title }}</strong>
                @foreach($q_details as $op)
                    <div class="row">
                        <div class="col-sm-12">
                             <div class="col-sm-6">
                                 <div class="col-sm-6">
                                     <td>{{ Form::radio('op',$op->id) }}</td>
                                     <td>{{$op->title}}</td><br>
                                 </div>
                                 <div class="col-sm-4">
                                     @if($op->answer == 1)
                                       {{ Form::checkbox('checkbox', '',array('checked')) }}Correct Answer<br>
                                     @endif
                                 </div>
                             </div>
                        </div>
                    </div>
                @endforeach
                @elseif($question_item->question_type == 'checkbox')
                    <strong>{{ $question_item->title }}</strong>
                        @foreach($q_details as $op)
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                       <div class="col-sm-6">
                                           <td>{{ Form::checkbox('op',$op->id)}}</td>
                                           <td>{{$op->title}}</td><br>
                                       </div>
                                       <div class="col-sm-4">
                                         @if($op->answer == 1)
                                           {{ Form::checkbox('checkbox', '',array('checked')) }}Correct Answer<br>
                                         @endif
                                       </div>
                                    </div>
                                </div>
                             </div>
                        @endforeach
                @else
                <b style="color:teal">Write Your Answer below.......</b>
                <div style="text-align: justify" class="text-right">
                    {{ Form::textarea('desc', null, ['size' => '80x8']) }}
                </div>
                @endif
            </div>
        </div>
        </br>
        <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
        </br></br>
</div>

