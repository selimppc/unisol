@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')

<div class="span9 well">
<table class="table table-striped table-bordered" id="myTable">

     <h4>Supporting  Documents</h4>

            {{--@if($supporting_docs != null)--}}
                 {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/profile/edit/' . $supporting_docs->id  ) }}" data-toggle="modal" data-target="#myeditModal" >Edit Supporting Documents</a>--}}
             {{--@else--}}
                 {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/supporting_docs/create')}}"  >Add Supporting Documents </a>--}}

             {{--@endif--}}


      {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('applicant/personal_info/edit/' . $applicant_personal_info->id ) }}" data-toggle="modal" data-target="#myeditModal" >Edit...</a>--}}
                    <thead>


                         <tr>
                            <th>Goal Statement</th>


                                 @if($supporting_docs->academic_goal_statement != null)
                                     <td>  {{ HTML::image('images/goal_statements/' .$supporting_docs->academic_goal_statement) }}
                                     <a class=" btn btn-xs btn-info" href="{{ URL::to('applicant/supporting_docs/edit/' . $supporting_docs->id ) }}" data-toggle="modal" data-target="#editgoalModal" >Edit</a> </td>
                                @else
                                    {{--{{ HTML::image('applicant_supporting_docs/' .$supporting_docs->academic_goal_statement) }}--}}
                                    <td><a class=" btn btn-xs btn-info" href="{{URL::to('applicant/goal_statements/add')}}" data-toggle="modal" data-target="#addgoalModal" >add</a></td>
                                 @endif

                          </tr>

                           <tr>
                              <th>Essay</th>

                              @if($supporting_docs->essay != null)
                                <td>  {{ HTML::image('images/applicant_essay/' .$supporting_docs->essay) }}
                                <a class=" btn btn-xs btn-info" href="{{URL::to('applicant/supporting_docs_essay/edit/'.$supporting_docs->id)}}" data-toggle="modal" data-target="#addessayModal" >Edit</a>
                               @else
                                 <td>
                                 <a class=" btn btn-xs btn-info" href="{{URL::to('applicant/supporting_docs_essay/create')}}" data-toggle="modal" data-target="#addessayModal" >add</a>
                                </td>
                                 @endif
                           </tr>



           </thead>

        <tbody>

     <br><br>
     </tbody>
    </table>

</div>
{{-----------------------------------------Modals------------------------------------------------------------}}

<!-- Modal : edit -->
<div class="modal fade" id="editgoalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit</h4>
      </div>
      <div class="modal-body">

      </div>

      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<!-- Modal : add goal -->
<div class="modal fade" id="addgoalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add</h4>
      </div>
      <div class="modal-body">

        <div style="padding: 20px;">
                <h4> </h4>

                {{Form::open(array('url'=>'applicant/goal_statements/store/'.$supporting_docs->id, 'class'=>'form-horizontal','files'=>true))}}

                <div class='form-group'>
                 <div>{{ Form::label('academic_goal_statement', 'academic_goal_statement') }}</div>
                 <div>{{ Form::file('academic_goal_statement', Input::old('essay'),['class'=>'form-control ']) }}</div>
                 </div>

                <p>&nbsp;</p>
                {{ Form::submit('change ', array('class'=>'btn btn-primary')) }}
                <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
                {{Form::close()}}
          </div>

      </div>


      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

{{--add : applicant's essay--}}
<div class="modal fade" id="addessayModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Add</h4>

      </div>
       <div class="modal-body">


       <div style="padding: 20px;">
        <h4> </h4>

        {{Form::open(array('url'=>'applicant/supporting_docs_essay/store/'.$supporting_docs->id, 'class'=>'form-horizontal','files'=>true))}}

        <div class='form-group'>
         <div>{{ Form::label('essay', 'Applicant Essay') }}</div>
         <div>{{ Form::file('essay', Input::old('essay'),['class'=>'form-control ']) }}</div>
         </div>

        <p>&nbsp;</p>
        {{ Form::submit('change ', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
        {{Form::close()}}
        </div>

       </div>


      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>


@stop