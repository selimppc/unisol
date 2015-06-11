@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')

<h3> Knowledge Base </h3>

<div class="row">
   <div class="box box-solid ">
      <br>
      {{-------------- Search :Starts -------------------------------------------}}
      <div>
          {{ Form::open(array('route'=>['knowledge-base.list'],'class'=>'form-horizontal')) }}
                <div  class="col-lg-5 pull-left" >
                    <div class="input-group input-group-sm">
                        {{ Form::text('keywords', Input::old('keywords'),['id'=>'search_knowledge_base', 'class'=>'ui-autocomplete form-control', 'autofocus','placeholder'=>'knowledgebase search by keywords']) }}
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="submit">Search</button>
                        </span>
                    </div>
                </div>
          {{ Form::close() }}
      </div>
       {{-------------- Search :Ends -------------------------------------------}}
       <div class="box-body">
       <p>&nbsp;</p><p>&nbsp;</p>
        <table id="" class="table table-striped  table-bordered">
            <tbody>
            @if(isset($data))
                 @foreach( $data as $values)
                     <tr>
                        <td>
                           <a href="{{ URL::route('details.knowledge-base',
                             ['kb_id' => $values->id]) }}" class="btn-link" title="Knowledge Base Details" style="color:#0490a6">
                             <ins><b>{{$values->title}}</b></ins>
                           </a>
                        </td>
                     </tr>
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



{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}



<script>

    /*$(function(){
        $( "#search_knowledge_base" ).click({
            source: "/cfo/ajax-search-kb",
            minLength: 1,
            *//*success: function(event, ui) {
                $('#kb-title').html(ui.item.label);
                $('#kb-description').html(ui.item.description);
              }*//*
              success: function(response)
              {
                  $('#kb-title').html(response.label);
                  $('#kb-description').html(response.description);
              }

      });
    });*/
     $(function(){
          $('#search_knowledge_base').click(function(e) {
            e.preventDefault();
            var $btn = $(this);
            $.ajax({
                url: '/cfo/ajax-search-kb',
                type: 'POST',
                dataType: 'json',
                data: { term:  $('#search_knowledge_base').val() },
                success: function(response)
                {
                    $btn.closest("tr").remove();
                    $('#something-delete').html(response);

                }
            });
          });
       });

</script>
@stop

