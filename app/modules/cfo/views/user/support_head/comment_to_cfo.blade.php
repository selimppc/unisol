
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
               <br>
               <small>Comments as below: </small>

               @foreach($reply_data as $v)
                         @if($v->replied_by =='user')
                             <p style="padding: 1%; background: #efefef;">
                                <b style="font-size: medium">Your Query/Response :</b><br>{{ isset($v->message)?$v->message:'' }}<br>
                             </p>
                         @endif
                        @if($v->replied_by =='staff')
                            <p style="padding: 1%; background: #efefef;">
                                <b style="font-size: medium">Replied By Cfo: </b><em style="color:#a52a2a" style="font-size: medium">{{User::FullName($v->support_user_id)}}</em> <br>{{ isset($v->message)?$v->message:'' }}<br>
                            </p>
                        @endif
               @endforeach
               <p>&nbsp;</p>
               @if($data->status == 'new')
                   <div class="form-group">
                      {{ Form::textarea('message', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                   </div>
               @endif
               @if($data->status == 'open')
                   <div class="form-group">
                      {{ Form::textarea('message', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                   </div>
               @endif
               @if($data->status == 'replied')
                   <div class="form-group">
                       {{ Form::textarea('message', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                   </div>
               @endif
               <p>&nbsp;</p>
                <a href="{{ URL::route('support-head.create')}}" class="pull-right btn btn-xs btn-success" style="margin-left: 5px">Cancel</a>
                 @if(!($data->status == 'closed'))
                    {{ Form::submit('Submit', array('class'=>'pull-right btn btn-xs btn-info')) }}
                    <a data-href="{{ URL::route('support-head.change-status',['id'=>$data->id, 'value'=>'closed'])}}" class="pull-left btn btn-xs btn-bitbucket" data-toggle="modal" data-target="#confirm-status-one" href="" id="hide-btn">Close This Issue</a>
                 @endif
            </div><!-- /.box -->

            {{ Form::close() }}
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
                     <h4 class="modal-title" id="myModalLabel">Confirmation to close the issue</h4>
                 </div>
                 <div class="modal-body">
                     <strong>Are you sure to close this support issue?</strong>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                     <a href="#" class="btn btn-primary primary">Submit</a>
                 </div>
             </div>
         </div>
     </div>


@stop



