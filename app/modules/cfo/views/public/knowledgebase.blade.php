@extends('layouts.layout')
  @section('top_menu')
@stop

@section('sidebar')
 @include('cfo::public._sidebar')
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
                        {{ Form::text('keywords', Input::old('keywords'),['id'=>'search_knowledge_base', 'class'=>'ui-autocomplete form-control', 'autofocus','placeholder'=>'knowledgebase']) }}
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-flat" type="submit">Search</button>
                        </span>
                    </div>
                </div>
          {{ Form::close() }}
          @include('cfo::public._script')
      </div>

       {{-------------- Search :Ends -------------------------------------------}}

       <div class="box-body">
       <p>&nbsp;</p><p>&nbsp;</p>
        <table id="" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Title</th>
                    <th> Description </th>
                    <th> Keywords</th>
                    {{--<th> Action</th>--}}
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="kb-title"></td>
                    <td id="kb-description"></td>
                </tr>
            </tbody>
            <tbody id="kb-knowledge-index">
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td>{{$values->title}}</td>
                    <td>{{$values->description}}</td>
                    <td>{{$values->keywords}}</td>

                 </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </div>
        {{--{{ $data->links() }}--}}
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


<input>
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

