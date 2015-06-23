@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')

{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}
<div>
   <a class="pull-right btn btn-xs btn-success" href="{{ action('CfoController@listOfKnowledgeBase')}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>
</div>
<h4><b>Knowledge Base : <em style="font-size: medium;color: #0490a6">{{$title}}</em></b> </h4>

<div class="row">
   <div class="box box-solid">
       <div class="box-body">
             <table id="" class="table table-striped  table-bordered" >
                <tbody>
                    @if(isset($data))
                        <tr>
                            <td>
                                <div class='kb_choice'>
                                    <div id="r1" class="rate_kb">
                                        <div class="star_1 ratings_stars"></div>
                                        <div class="star_2 ratings_stars"></div>
                                        <div class="star_3 ratings_stars"></div>
                                        <div class="star_4 ratings_stars"></div>
                                        <div class="star_5 ratings_stars"></div>
                                        <div class="total_votes">vote data</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
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

<script>
    $(function() {
        $('.ratings_stars').hover(
                // Handles the mouseover
                function (e) {
                    $(this).prevAll().andSelf().addClass('ratings_over');
                    $(this).nextAll().removeClass('ratings_vote');
                },
                // Handles the mouseout
                function (e) {
                    $(this).prevAll().andSelf().removeClass('ratings_over');
                    //set_votes($(this).parent());
                }
        );

        $( '.rate_kb').click(function(e) {
            e.preventDefault();
            //var keyword = $('#search_knowledge_base').val();
            $.ajax({
                url: '/cfo/ajax/knowledgebase/rating',
                type: 'POST',
                dataType: 'json',
                //data: { keyword:  keyword },
                success: function(response)
                {
                    alert('PPP');
                }
            });
        });

        /*$('.rate_kb').each(function(i) {
            var widget = this;
            var out_data = {
                widget_id : $(widget).attr('id'),
                fetch: 1
            };
            $.post( alert('fsdsdf'),
                    'ajax.knowledgebase.rating',
                    out_data,
                    function(INFO) {
                        $(widget).data( 'fsr', INFO );
                        //set_votes(widget);
                    },
                    'json'
            );
        });*/

        function set_votes(widget) {

            var avg = $(widget).data('fsr').whole_avg;
            var votes = $(widget).data('fsr').number_votes;
            var exact = $(widget).data('fsr').dec_avg;

            $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratings_vote');
            $(widget).find('.star_' + avg).nextAll().removeClass('ratings_vote');
            $(widget).find('.total_votes').text( votes + ' votes recorded (' + exact + ' rating)' );
        }
    });
</script>

<style>
    .rate_kb {
        border:     1px solid #CCC;
        overflow:   visible;
        padding:    10px;
        position:   relative;
        width:      190px;
        height:     52px;
    }
    .ratings_stars {
        background: url("{{ URL::asset('assets/images/star_empty.png') }}") no-repeat;
        float:      left;
        height:     28px;
        padding:    0px;
        width:      32px;
    }
    .ratings_vote {
        background: url("{{ URL::asset('assets/images/star_full.png') }}") no-repeat;
    }
    .ratings_over {
        background: url("{{ URL::asset('assets/images/star_highlight.png') }}") no-repeat;
    }

    .total_votes {
        background: #eaeaea;
        top: 58px;
        left: 0;
        padding: 5px;
        position:   absolute;
    }
    .kb_choice {
        font: 10px verdana, sans-serif;
        margin: 0 auto 40px auto;
        width: 180px;
    }
</style>


@stop
