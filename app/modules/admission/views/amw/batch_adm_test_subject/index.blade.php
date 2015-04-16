@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.amw.batch',['degree_id'=> $degree_name->degree_id])}}"> <i class="fa fa-arrow-circle-left"></i>Back To Batch</a>
<h3> Manage Admission Test Subjects (MATS)  </h3>
    <div class="row">
    <div class="box box-solid ">
    <div class="box-body">
        <div class="row">
            <div class="pull-left col-sm-6 ">
                <strong> Degree: </strong>
                {{ $degree_name->relDegree->relDegreeLevel->code.''.$degree_name->relDegree->relDegreeGroup->code.' In '.$degree_name->relDegree->relDegreeProgram->code.','.$degree_name->relSemester->title.'-'.$degree_name->relYear->title }}
            </div>
            <div class="pull-right col-sm-6">
            <a href="{{ URL::route('admission.amw.batch-adm-test-subject.create_admtest_subject',['batch_id'=>$batch_id])}}" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal" >Add Subject To Degree</a>
           </div>
        </div>

        <table id="example" class="table table-striped  table-bordered"  >
              <thead>
               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}} <br>
                 <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Exam Duration</th>
                    <th>Action</th>
                 </tr>
          </thead>
          <tbody>
            @if(!empty($degree_test_sbjct))
              @foreach($degree_test_sbjct as $batch_adm_tst_sbjct)
                <tr>
                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $batch_adm_tst_sbjct['id'] }}"></td>
                    <td>{{ isset($batch_adm_tst_sbjct->relAdmTestSubject->title) ? $batch_adm_tst_sbjct->relAdmTestSubject->title : '' }} </td>
                    <td>{{ $batch_adm_tst_sbjct->marks }} </td>
                    <td>{{ $batch_adm_tst_sbjct->duration }} &nbsp; Minutes</td>

                    <td>
                          <a href="{{ URL::route('admission.amw.batch-adm-test-subject.view_admtest_subject', ['id'=>$batch_adm_tst_sbjct->id])  }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Show" href="#">View</a>
                          <a href="{{ URL::route('admission.amw.batch-adm-test-subject.edit_admtest_subject', ['id'=>$batch_adm_tst_sbjct->id, 'batch_id'=>$batch_adm_tst_sbjct->batch_id])  }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal" data-placement="left" title="Edit" href="#">Edit</a>
                    </td>
                </tr>
              @endforeach
            @endif
          </tbody>
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
