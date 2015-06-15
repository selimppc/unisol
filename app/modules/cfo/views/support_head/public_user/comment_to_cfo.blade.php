
@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <!-- left column -->
    <div class="col-md-10"  style="margin-left: 90px">
        <!-- general form elements -->
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="text-center text-green">User Support</h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="padding: 30px;">

                {{Form::open(['route'=>'support-head.response-by-user', 'files'=>true])}}
                   {{Form::hidden('id', $data->id)}}
                   {{Form::hidden('cfo_support_head_id', $data->cfo_support_head_id)}}
                   <table class="table table-striped  table-bordered">
                   <tr>
                       <td class="width1">User Name:</td>
                       <td class="width2">{{ isset($data->name)?$data->name:''}}</td>
                   </tr>
                   <tr>
                       <td class="width1">User Email:</td>
                       <td class="width2">{{ isset($data->email)?$data->email:''}}</td>
                   </tr>
                   <tr>
                       <td class="width1">Subject:</td>
                       <td class="width2">{{ isset($data->subject)?$data->subject:''}}</td>
                   </tr>

                   <tr>
                       <td class="width1">Status :</td>
                       <td  class="width2">
                           {{isset($data->status)?ucfirst($data->status):''}}
                       </td>
                   </tr>
               </table>
               <small>Comments as below: </small>

               @foreach($reply_data as $v)
                    <p style="padding: 1%; background: #efefef;">
                         @if($v->replied_by =='user')
                            <b style="font-size: medium">Your Query/Response :</b><br>{{ isset($v->message)?$v->message:'' }}<br>
                        @endif
                        @if($v->replied_by =='staff')
                            <b style="font-size: medium">Replied By : </b><em style="color:#a52a2a" style="font-size: medium">{{User::FullName($v->support_user_id)}}</em> <br>{{ isset($v->message)?$v->message:'' }}<br>
                        @endif
                   </p>
               @endforeach

               <div class="form-group">
                     {{ Form::textarea('message', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
               </div>

                <p>&nbsp;</p>
                {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
                <a href="/" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
                <p>&nbsp;</p>
            </div><!-- /.box -->
            {{ Form::close() }}
            <td>
                @if($data->status == 'open')
                    <a data-href="{{ URL::route('support-head.change-status',['id'=>$data->id, 'value'=>'closed'])}}" class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-status-one" href="" >Close This</a>
                @endif
                @if($data->status == 'replied')
                    <a data-href="{{ URL::route('support-head.change-status',['id'=>$data->id, 'value'=>'closed'])}}" class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-status-one" href="" >Close This</a>
                @endif
                @if($data->status == 'new')
                    <a data-href="{{ URL::route('support-head.change-status',['id'=>$data->id, 'value'=>'closed'])}}" class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-status-one" href="" >Close This</a>
                @endif
            </td>
            <p>&nbsp;</p>
        </div>
    </div>

<!-- Modal  -->
 <div class="modal fade" id="reply" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

        </div>
      </div>
 </div>

 {{--<!-- Modal for status -->--}}
     <div class="modal fade" id="confirm-status-one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Confirm to change status</h4>
                 </div>
                 <div class="modal-body">
                     <strong>Are you sure to change status?</strong>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <a href="#" class="btn btn-primary primary">Change</a>
                 </div>
             </div>
         </div>
     </div>

@stop



