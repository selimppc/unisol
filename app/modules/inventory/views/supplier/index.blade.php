@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">

        <div class="col-sm-12">
           <div class="pull-left col-sm-4"> <h3> {{$pageTitle}} </h3>  </div>
           <div class="pull-right col-sm-4" style="padding-top: 1%;">
                <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                  + New Supplier
                </button>
           </div>
        </div>

        {{Form::open([ 'route'=>'supplier-batch-delete' ])}}
       <div class="box-body">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th> Code</th>
                    <th> Company Name </th>
                    <th> Country </th>
                    <th> Zip Code  </th>
                    <th> Contact Person </th>
                    <th> Phone </th>
                    <th> Cell Phone </th>
                    <th> Email </th>
                    <th> Web </th>
                    <th> Status </th>
                    <th> Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $values)
                 <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                    <td>{{$values->code}}</td>
                    <td>{{$values->company_name}}</td>
                    <td>{{Str::title($values->relCountry->title)}}</td>
                    <td>{{$values->zip_code}}</td>
                    <td>{{Str::title($values->contact_person)}}</td>
                    <td>{{$values->phone}}</td>
                    <td>{{$values->cell_phone}}</td>
                    <td>{{$values->email}}</td>
                    <td>{{$values->web}}</td>
                    <td>{{$values->status}}</td>
                    <td>
                        <a href="{{ URL::route('supplier/show', ['s_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><span class="fa fa-eye"></span></a>
                        <a href="{{ URL::route('supplier/edit',['s_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::route('supplier/destroy', ['s_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" ></i></a>

                    </td>

                 </tr>
                @endforeach
            </tbody>

        </table>
        </div>
        {{form::close() }}

    </div>

</div>
{{Form::open(['route'=>'supplier/store', 'files'=>true])}}
        @include('inventory::supplier._modal._modal')
{{ Form::close() }}



{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop