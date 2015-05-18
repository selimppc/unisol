@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.amw.batch',['degree_id'=> $batch->degree_id])}}"> <i class="fa fa-arrow-circle-left"></i>Back To Batch</a>
<h3> Manage Admission Test Subjects (MATS)  </h3>
    <div class="row">
    <div class="box box-solid ">
    <div class="box-body">
        <div class="row">
            <div class="pull-left col-sm-6 ">
                <strong> Degree: </strong>
                {{ $batch->relVDegree->title }}
            </div>
            <div class="pull-right col-sm-6">
            <a href="{{ URL::route('admission.amw.batch-adm-test-subject.create_admtest_subject',['batch_id'=>$batch->id])}}" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal" >Add Subject To Degree</a>
           </div>
        </div>
        {{ Form::open(array('url' => 'admission/amw/batch-delete-batchadmtest-subject')) }}
        <table id="example" class="table table-striped  table-bordered"  >
              <thead>

                 <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Exam Duration</th>
                    <th>Action</th>
                 </tr>
          </thead>
          <tbody>
          {{ Form::submit('Delete Items', array('class'=>'btn btn-xs btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
            @if(!empty($batch_test_subject))
              @foreach($batch_test_subject as $bats)
                <tr>
                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $bats->id }}"></td>
                    {{--<td><input type="checkbox" name="ids[]"  class="myCheckbox" value="{{ $value->id }}">--}}
                    <td>{{ isset($bats->relAdmTestSubject->title) ? $bats->relAdmTestSubject->title : '' }} </td>
                    <td>{{ $bats->marks }} </td>
                    <td>{{ $bats->duration }} &nbsp; Minutes</td>

                    <td>
                          <a href="{{ URL::route('admission.amw.batch-adm-test-subject.view_admtest_subject', ['id'=>$bats->id, 'batch_id'=>$bats->batch_id])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                          <a href="{{ URL::route('admission.amw.batch-adm-test-subject.edit_admtest_subject', ['id'=>$bats->id, 'batch_id'=>$bats->batch_id])  }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>
                    </td>
                </tr>
              @endforeach
            @endif
          </tbody>
          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}
        </table>
    {{form::close() }}

</div>
</div>
</div>
<p>&nbsp;</p><p>&nbsp;</p>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
      <div class="modal-content">

     </div>
    </div>
</div>


@stop
