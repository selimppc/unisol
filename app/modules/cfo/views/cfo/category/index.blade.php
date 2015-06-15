@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_cfo')
@stop

@section('content')
<button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
  + New Category
</button>
<h3> Category </h3>

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"></div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
           </div>
        </div>

        {{Form::open([ 'route'=>'product-batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> Title</th>
                    <th> Description </th>
                    <th> Support Name</th>
                    <th> Support Email  </th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>

                    <td>{{$values->title}}</td>
                    <td>{{$values->description}}</td>
                    <td>{{$values->support_name}}</td>
                    <td>{{$values->support_email}}</td>
                    <td>
                        <a href="{{ URL::route('category.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#category" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-xs btn-default" href="{{ URL::route('edit.category',['id'=>$values->id]) }}" data-toggle="modal" data-target="#category" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('delete.category',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                    </td>
                 </tr>
                @endforeach
            @endif
            </tbody>

        </table>
        </div>
        {{form::close() }}
        {{ $data->links() }}
    </div>

</div>
{{Form::open(['route'=>'category.store', 'files'=>true])}}
        @include('cfo::...modal._modal')
{{ Form::close() }}


{{-- Modal Area --}}
<div class="modal fade" id="category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop