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
           <table id="example" class="table table-striped table-bordered">
               <tbody>
               @if(isset($data))
                   @foreach($data as $values)
                       <div class="col-lg-6" >
                            <label class="radio-inline"><input type="radio" name="radio"  value="{{ $values->id }}" data-toggle="modal" data-target="#support"></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$values->title}}<br><br>
                       </div>
                   @endforeach
               @endif
               </tbody>
               <div style="margin-right: 30px">
                    <a class="pull-right btn btn-sm btn-info" href="{{ URL::route('support-head.create') }}" data-toggle="modal" data-target="#support" style="color: #ffffff"><b>Next</b></a>
               </div>
           </table>
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

