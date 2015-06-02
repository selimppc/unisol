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
          {{ Form::open(array('route'=>['kb-ajax-search'],'id'=>'knowledge-base-search')) }}
                <div  class="col-lg-5 pull-left" >
                    <div class="input-group input-group-sm">
                        {{ Form::text('keywords', Input::old('keywords'),['id'=>'search_knowledge_base', 'class'=>'form-control', 'autofocus', 'placeholder'=>'knowledge base']) }}
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
                    {{--<th> Keywords</th>--}}
                    {{--<th> Action</th>--}}
                </tr>
            </thead>
            <tbody id="show-search" style="padding: 10px">

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



<script>

    $(function(){
          $( '#knowledge-base-search').on('submit', function(e) {
            e.preventDefault();
            var keyword = $('#search_knowledge_base').val();
            $.ajax({
                url: 'kb-ajax-search',
                type: 'POST',
                dataType: 'json',
                data: { keyword:  keyword },
                success: function(response)
                {
                    var tbl = $("<tbody/>").attr("id","search-result-kb");
                    $("#show-search").append(tbl);
                    for(var i=0; i<response.length; i++)
                    {
                        var tr = "<tr>";
                        var td1 = "<td>"+response[i]["label"]+"</td>";
                        var td2 = "<td>"+response[i]["description"]+"</td></tr>";
                       $("#search-result-kb").append(tr + td1 + td2);
                    }
                   $("#kb-knowledge-index").hide();
                }
            });
          });
        });


</script>
<style>
    #search-result-kb{
        color: red;
    }
    #search-result-kb {

    }

</style>
@stop

