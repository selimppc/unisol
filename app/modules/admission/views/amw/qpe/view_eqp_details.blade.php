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
            <div class="col-xs-6">
                <b>Total# of Question : </b> : {{$count->total}}
            </div>
            <div class="col-xs-6">
                <b>Marks Obtain </b> : {{$count->marks}}
            </div>
        </div>


        <table>
            <tbody><br>
                <ol>
                    @foreach($qlist as $value)
                        <li><span> {{$value['question_title']}}</span>
                            <br><b>Marks: </b>{{$value['marks']}}
                            @if($value['type'] == 'text')
                                <p style="margin-left: 2%;" >
                                    {{$value['answer']}}
                                </p>
                            @elseif($value['type'] == 'radio')
                                <ol>
                                    @foreach($value['options'] as $val)
                                        @if($value['answer'] == $val['id'] && $val['answer'] == 1)
                                            <li style="color:#4DB849">{{$val['title']}}</li>
                                        @elseif($value['answer'] == $val['id'])
                                            <li style="color:#E25F50">{{$val['title']}}</li>
                                        @elseif($val['answer'] == 1)
                                            <li style="color:#FCD209">{{$val['title']}}</li>
                                        @else
                                            <li>{{$val['title']}}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            @elseif($value['type'] == 'checkbox')
                                <ol>
                                    @foreach($value['options'] as $val)
                                        @if(in_array($val['id'],$value['answer'])  && $val['answer'] == 1)
                                            <li style="color:#4DB849">{{$val['title']}}</li>
                                        @elseif(in_array($val['id'], $value['answer']))
                                            <li style="color:#E25F50">{{$val['title']}}</li>
                                        @elseif($val['answer'] == 1)
                                            <li style="color:#FCD209">{{$val['title']}}</li>
                                        @else
                                            <li>{{$val['title']}}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            @endif
                        </li>
                    @endforeach
                </ol>
            </tbody>
        </table>


    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>