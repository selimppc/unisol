@extends('layouts.layout')
  @section('top_menu')
@stop

@section('sidebar')
 @include('cfo::public._sidebar')
@stop

@section('content')

<h4><b>Knowledge Base : <em style="font-size: medium;color: #0490a6">{{$title}}</em></b> </h4>

<div class="row">
   <div class="box box-solid ">
       <div class="box-body">

          <div class="pull-left">rating(1-5)
           {{ Form::open(array('route'=>['ajax.knowledgebase.rating'],'id'=>'knowledge-base-rating')) }}
                 <div class="rating" style="font-size: x-large;color:crimson">
                     <span id="rating_5" title="vote 5">☆</span>
                     <span id="rating_4" title="vote 4">☆</span>
                     <span id="rating_3" title="vote 3">☆</span>
                     <span id="rating_2" title="vote 2">☆</span>
                     <span id="rating_1" title="vote 1">☆</span>
                 </div>
           {{ Form::close() }}
          </div>

          <p>&nbsp;</p>
             <table id="" class="table table-striped  table-bordered" >
                <tbody>
                <p>&nbsp;</p>
                    @if(isset($data))
                         <tr>
                          <td>
                             {{$data->description}}
                         </tr>
                    @endif
                </tbody>
                <p>&nbsp;</p>
             </table>
       </div>
   </div>
</div>

<style>
    .rating span:hover:before {
       content: "\2605";
       position: absolute;
    }
    .rating span {
      display: inline-block;
      position: relative;
      width: 1.1em;
    }
    .rating span:hover:before,
    .rating span:hover ~ span:before {
       content: "\2605";
       position: absolute;
    }
</style>


<script>

    $(function(){
          $('').click(function() {
              var star = $(this);
              alert(star);
          }
    });


</script>

@stop

