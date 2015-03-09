@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
  <div class="box-body">

     <h3> Degree List </h3>

  </div>
   <div class="row">
     <div class="col-xs-12">

        <div class="box">

<br>

{{ Form::open(['route' => ['admission.degree_save']]) }}

 {{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                           <td class="col-lg-1"><input name="checkbox" type="checkbox" id="checkbox" class="checkbox" value=""></td>
                           <th class="col-lg-4" > degree Name</th>
                           <th >Description</th>
                    </tr>
                </thead>

                       <tbody>
                             @foreach($degreeList as $value)
                                   <tr >
                                          <td> <input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $value->id }}"></td>
                                          <td>{{ $value->title }}
                                          <a href="{{ URL::route('admission.degree_details', ['degree_id' => $value->id]) }}">details</a>
                                          </td>
                                          <td>{{ $value->description }}</td>
                                   </tr>

                             @endforeach
                       </tbody>
            </table>


  {{ Form::submit('Apply All', array('class'=>'pull-right btn btn-info'))}}

  {{ Form::close() }}
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--------Pagination Link--------------------------}}
   <div class="pull-right paginate-button">
    {{--{{$model->links()}}--}}
   </div>

         </div><!-- /.box -->
      </div>
   </div>
</section>

{{---------------------------------------------------Modals-----------------------------------------------}}
 <!-- Modal :: add Information -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

       </div>
      </div>
 </div>


@stop

