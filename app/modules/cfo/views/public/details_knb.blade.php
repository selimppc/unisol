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

          <div class='kb_choice'>

              <div id="r1" class="rate_widget">
                  <div class="star_1 ratings_stars"></div>
                  <div class="star_2 ratings_stars"></div>
                  <div class="star_3 ratings_stars"></div>
                  <div class="star_4 ratings_stars"></div>
                  <div class="star_5 ratings_stars"></div>
                  <div class="total_votes">vote data</div>
              </div>
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
.rate_widget {
    border:     1px solid #CCC;
    overflow:   visible;
    padding:    10px;
    position:   relative;
    width:      180px;
    height:     32px;
}
.ratings_stars {
     background-image: url("/public/img/star_empty.png")no-repeat;
    float:      left;
    height:     28px;
    padding:    2px;
    width:      32px;
}

.kb_choice {
    font: 10px verdana, sans-serif;
    margin: 0 auto 40px auto;
    width: 180px;
}
</style>




@stop

