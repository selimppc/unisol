<div style="padding: 10px; width: 90%;">
        <h2>Assign Examination : <strong></strong></h2>
              {{ Form::open($assign_faculty,array('url' => array('examination/amw/assignFaculty',$assign_faculty->id), 'method' =>'post'))  }}
                    @include('examination::amw/prepare_question_paper/_assignFaculty_form')
              {{ Form::close() }}

</div>