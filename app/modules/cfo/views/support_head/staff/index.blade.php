@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_cfo')
@stop
@section('content')

<h3> Support Desk </h3>

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4">   </div>
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
                    <th> Name</th>
                    <th> Email </th>
                    <th> Phone</th>
                    <th> Subject</th>
                    <th> Priority</th>
                    <th> Support Code</th>
                    <th> Status</th>
                </tr>
            </thead>
            <tbody>
            {{--@if(isset($knb_data))--}}
                {{--@foreach($knb_data as $values)--}}
                 {{--<tr>--}}
                    {{--<td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>--}}

                    {{--<td>{{$values->title}}</td>--}}
                    {{--<td>{{$values->description}}</td>--}}
                    {{--<td>{{$values->keywords}}</td>--}}
                    {{--<td>--}}
                        {{--<a href="{{ URL::route('knowledge-base.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#knb" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>--}}
                        {{--<a class="btn btn-xs btn-default" href="{{ URL::route('edit.knowledge-base',['id'=>$values->id]) }}" data-toggle="modal" data-target="#knb" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>--}}
                        {{--<a data-href="{{ URL::route('delete.knowledge-base',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>--}}
                    {{--</td>--}}
                 {{--</tr>--}}
                {{--@endforeach--}}
            {{--@endif--}}
            </tbody>
        </table>
        </div>
        {{form::close() }}
        {{--{{ $knb_data->links() }}--}}
    </div>
</div>

{{-- Modal Area --}}
<div class="modal fade" id="support-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        </div>
    </div>
</div>


@stop