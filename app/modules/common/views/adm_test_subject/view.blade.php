<div style="padding: 10px; width: 90%;">
                 <h2>Welcome to View Adm Test Subject <strong></strong> </h2>
                     {{ Form::open(array('route'=>'common.adm_test_subject.show','method' => '')) }}
                             <div class="jumbotron text-center">
                                 <h3><strong>Title : </strong> &nbsp; {{ $view_adm_test_subject->title }}</h3> </br>

                                 <p>
                                     <strong> Description:</strong>&nbsp; {{ $view_adm_test_subject->description}} </br>

                                     <strong> Priority:</strong>&nbsp; {{ $view_adm_test_subject->priority }} </br>

                                 </p>
                             </div>

                             <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

                             &nbsp;
                             </br>
                             &nbsp;

                     {{ Form::close() }}
</div>