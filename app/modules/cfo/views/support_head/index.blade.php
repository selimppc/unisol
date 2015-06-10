@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')

<h3>Support Desk</h3>

<div class="row">
   <div class="box box-solid"><p>&nbsp;</p>
       <div style="margin-left: 20px">
           <b><em><ins>Please Select Category For Any Support.....</ins></em></b>
       </div>
       <div class="box-body">
           {{ Form::open(['route' => ['support-head.store']]) }}
           {{Form::hidden('support_code', $support_code)}}
               <table id="example" class="table table-striped table-bordered">
                   <tbody>
                       @if(isset($data))
                           @foreach($data as $values)
                               <div class="col-lg-6">
                                    <label class="radio-inline"><input type="radio" name="cfo_category_id"  value="{{ $values->id }}"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$values->title}}<br><br>
                               </div>
                           @endforeach
                       @endif
                   </tbody>
                   <div style="margin-right: 30px">
                       <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                            Next
                       </button>
                   @include('cfo::support_head._modal')
                   </div>
               </table>
           {{ Form::close() }}
       </div>
   </div>
</div>

{{-- Modal Area --}}
<div class="modal fade" id="support" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>


<script>


</script>

@stop

