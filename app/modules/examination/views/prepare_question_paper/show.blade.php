<div style="padding: 10px; width: 90%;">



    {{ Form::open(array('url'=>'prepare_question_paper/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{ $prepareQuestionPaper->title }}</h2>
            <p>
                <strong> Exam List Id:</strong> {{ ExmExamList::getExamName($prepareQuestionPaper->exm_exam_list_id) }} <br>
                <strong> Deadline:</strong> {{ $prepareQuestionPaper->deadline }}<br>
                <strong> Total Marks:</strong> {{ $prepareQuestionPaper->total_marks }}<br>
                <strong> Created By:</strong> {{ $prepareQuestionPaper->created_by }}<br>
                <strong> Updated By:</strong> {{ $prep_quest_paper->updated_by }}<br>

            </p>
        </div>

    <a href="{{URL::to('prepare_question_paper/index')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>

