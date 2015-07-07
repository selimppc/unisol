@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_hr')
@stop
@section('content')

<button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
  + Work Week
</button>
<h3>HR Work Week </h3>

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"></div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
           </div>
        </div>

        {{Form::open([ 'route'=>'work-week.batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> Year</th>
                    <th> Month </th>
                    <th> Day</th>
                    <th> Status </th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($data))
                @foreach($data as $values)
                 <tr>
                    <td><input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>

                    <td>{{$values->relYear->title}}</td>
                    <td>{{ucfirst($values->month)}}</td>
                    <td>{{ucfirst($values->day)}}</td>
                    <td>{{ucfirst($values->status)}}</td>
                    <td>
                        <a href="{{ URL::route('work-week.show',['id'=>$values->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#work-week" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-xs btn-default" href="{{ URL::route('work-week.edit',['id'=>$values->id]) }}" data-toggle="modal" data-target="#work-week" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                        {{--<a data-href="{{ $values->id }}" class="btn btn-default btn-sm delete-dt-2" id="delete-dt-2{{ $values->id }}" ><i class="fa fa-trash-o" style="font-size: 12px;color: red"></i></a>--}}
                        <a data-href="{{ URL::route('work-week.delete',$values->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
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

{{ Form::open(array('route' => 'work-week.store')) }}
     @include('hr::hr.work_week._modal._modal')
{{ Form::close() }}


{{-- Modal Area --}}
<div class="modal fade" id="work-week" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>

<script>
    $('.delete-dt-2').click(function(e) {
        e.preventDefault();
        var $btn = $(this);
        $.ajax({
            url: 'ajax-delete-salary-trn-dtl',
            type: 'POST',
            dataType: 'json',
            data: { id:  $(this).data("href") },
            success: function(response)
            {
                $btn.closest("tr").remove();
                $('#something-delete').html(response);
            }
        });
    });
</script>
@stop