<div style="padding: 5px; width: 90%;">

             <h2>Welcome to View Examiners <strong></strong> </h2> </br>
             {{ Form::open(array('route'=>'amw.admission_test.view_examiners','method' => '')) }}
                     <div class="jumbotron text-center">

                            <strong> Department: </strong>{{ $data }} </br>

                            <strong> Degree: </strong> {{ Degree::getDegreeName($degree_id) }} </br>

                            <strong> Name of Faculty: </strong> {{ $adm_view_examiners->relUser->relUserProfile->first_name.' '.$adm_view_examiners->relUser->relUserProfile->middle_name.' '.$adm_view_examiners->relUser->relUserProfile->last_name }} </br>

                            <strong> Status: </strong>  {{ $adm_view_examiners->status }} </br>

                            <strong> Comments: </strong> </br> {{--{{ $adm_view_examiners->comment }}--}} </br>

                            <div class="form-group">
                                  {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                            </div>

                     </div>

                     <a href="{{URL::previous('amw/admission_test/examiners')}}" class="btn btn-default btn-xs">Close </a>
                     {{--{{ Form::submit('Comments', array('class' => 'btn btn-primary btn-xs')) }}--}}
             {{ Form::close() }}

</div>