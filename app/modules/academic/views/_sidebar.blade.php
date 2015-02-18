<div class="panel panel-default">
   @if((Role::find(Auth::user()->role_id)->title)=='amw')
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-user">
                    </span>You are loggged in as <strong>{{ ucwords(Auth::user()->username) }} </strong></a>
            </h4>
        </div>
        {{-- sidebar for courseconfig for amw--}}
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">

                    <tr>
                        <td>
                            <a href="{{ action('AcmAmwController@amw_index') }}">All Item List</a> <span class="label label-success"></span>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <a href="{{ action('AcmAmwController@config_index') }}">Course Config</a> <span class="label label-info"></span>
                        </td>

                    </tr>

                </table>
            </div>
        </div>
       {{--End courseconfig--}}

   @elseif((Role::find(Auth::user()->role_id)->title)=='faculty')
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-in">
                        </span>You loggged in as <strong>{{ ucwords(Auth::user()->username) }} </strong></a>
            </h4>
        </div>
        {{-- sidebar for marks distribution at courses and item for faculty--}}
        <div id="collapseTwo" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="{{ action('AcmFacultyController@index') }}">Courses</a> <span class="label label-success"></span>
                        </td>
                    </tr>
                    @if(isset($data))
                        @foreach($data as $key => $value)
                            <tr>
                                <td>{{$value['relCourse']['title']}}</td>
                            </tr>
                        @endforeach
                    @endif

                    @if(isset($config_data))
                        @foreach($config_data as  $dkey => $dvalue)
                            <tr>
                                <td>
                                    <?php $check_array = array(1,2,3,4,5); ?>
                                    @if(in_array($dvalue['relAcmMarksDistItem']['id'], $check_array))<a href="{{ URL::to('academic/faculty/marksdistitem/class')  }}">{{$dvalue['relAcmMarksDistItem']['title']}}</a>
                                    @else
                                        {{$dvalue['relAcmMarksDistItem']['title']}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif


                </table>
            </div>
        </div>

@endif

</div>

