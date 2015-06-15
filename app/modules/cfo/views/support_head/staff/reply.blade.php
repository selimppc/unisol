
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3 style="text-align: center;"></h3>
</div>

<div style="padding-left: 1px; width: 90%;">

    {{Form::open(array('route'=>'support-head.reply-to-user','method' => 'POST')) }}
    {{Form::hidden('id', $data->id)}}
    {{Form::hidden('cfo_support_head_id', $data->cfo_support_head_id)}}


        <div  style="padding-left: 8%">
            <p>&nbsp;</p>
            <p>
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
                          {{--Reply To User  <b>{{ isset($v->relCfoSupportHead->name) ? User::FullName($v->relCfoSupportHead->name):'' }}</b>--}}
                          {{--From <b>{{ User::FullName($v->commented_by) }}</b>&nbsp; As &nbsp;--}}
                          {{--<b><small>{{  strtoupper(Role::RoleName($v->commented_by)) }} : </small></b><br>--}}
                         {{ isset($v->message)?$v->message:'' }}<br>
                    </p>
                @endforeach

                <div class="form-group">
                      {{ Form::textarea('message', Null, ['class' => 'form-control', 'placeholder'=>'Your Comments Here', 'style'=>'height: 100px;']) }}
                </div>
            </p>
        </div>
    {{ Form::submit('Submit Comment', array('class'=>'pull-right btn-sm btn-info')) }}
    <a href="" class="pull-right btn-sm btn-default" style="margin-right: 5px">Close</a>
    &nbsp;
    </br>
    &nbsp;
    {{ Form::close() }}
</div>

<style>
.width1{
width: 10px;
}
.width2{
width: 90px;

}
</style>