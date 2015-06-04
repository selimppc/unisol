@extends('layouts.layout')
  @section('top_menu')
@stop

@section('sidebar')
 @include('cfo::public._sidebar')
@stop

@section('content')

<h3> </h3>

<div class="row">
   <div class="box box-solid">
       <div class="box-body">
       <table id="example" class="table table-striped  table-bordered">
           <tbody>
           @if(isset($data))
               @foreach($data as $values)
                   <div class="">
                        <label class="radio-inline"><input type="radio" name="" class="rButton" value="{{ $values->id }}">{{$values->title}}</label>
                   </div>

               @endforeach
           @endif
           </tbody>
       </table>
        </div>
   </div>
</div>

{{-- Modal Area --}}
<div class="modal fade" id="knb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>



{{--{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}--}}
{{--{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}--}}


<style>
.rButton {
    width: 63px;
    height: 52px;
    vertical-align: middle;
}
.convText {
    font-family:'Segoe UI';
    font-size:20px;
    vertical-align: middle;
}
</style>
<script>




</script>
@stop

