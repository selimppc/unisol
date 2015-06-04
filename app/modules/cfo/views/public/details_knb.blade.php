@extends('layouts.layout')
  @section('top_menu')
@stop

@section('sidebar')
 @include('cfo::public._sidebar')
@stop

@section('content')

<h4><b>Knowledge Base : <em style="font-size: medium;color: #0490a6">{{$title}}</em></b> </h4>

<div class="row">
   <div class="box box-solid">
       <div class="box-body">
          <div class="rating" style="font-size: x-large;color:darkorange">
               <span class="ratings_stars" title="vote 1">☆</span>
               <span class="ratings_stars" title="vote 2">☆</span>
               <span class="ratings_stars" title="vote 3">☆</span>
               <span class="ratings_stars" title="vote 4">☆</span>
               <span class="ratings_stars" title="vote 5">☆</span>
          </div>
             <table id="" class="table table-striped  table-bordered" >
                <tbody>
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


</style>

<script>
 /*$('.ratings_stars').hover(
     // Handles the mouseover
     function() {
         $(this).prevAll().andSelf().addClass('ratings_over');
         $(this).nextAll().removeClass('ratings_vote');
     },
     // Handles the mouseout
     function() {
         $(this).prevAll().andSelf().removeClass('ratings_over');
         set_votes($(this).parent());
     }
 );*/
</script>


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


@stop

