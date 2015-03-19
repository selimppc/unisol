@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
   <h1>Batch Management </h1>

<div class="row">
           <div class="col-sm-12">
               <div class="pull-right col-sm-4">
                   <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/create')}}" data-toggle="modal" data-target="#modal" >Add Batch</a>
               </div>


                {{--<div class="col-sm-12">--}}
                        {{--<div style="width:100%; float:left;">--}}
                            {{--<div style="width:50%; float:left;" class="">--}}
                                {{--<div class="col-sm-6">--}}
                                    {{--<div class='form-group'>--}}
                                               {{--{{ Form::label('status', 'Selct Status') }}--}}
                                               {{--{{ Form::select('status',--}}
                                                   {{--array('' => 'Select Status',--}}
                                                   {{--'Created' => 'Created  (CRTD)',--}}
                                                   {{--'Ask for Application' => 'Ask for Application (AFA)',--}}
                                                   {{--'Application Time Over' => 'Application Time Over (ATO)',--}}
                                                   {{--'Selection and Scrutinizing' => 'Selection and Scrutinizing (SNS)',--}}
                                                   {{--'Admission Test' => 'Admission Test (ADMT)',--}}
                                                   {{--'Admission Test Evaluation' => 'Admission Test Evaluation (ADTE)',--}}
                                                   {{--'Merit List Preparation' => 'Merit List Preparation (MRPR)',--}}
                                                   {{--'Final Selection ' => 'Final Selection (FNLS)',--}}
                                                   {{--'Admission' => 'Admission (ADMN)',--}}
                                                   {{--'Activity Start' => 'Activity Start (ACTS)',--}}
                                                   {{--'Running' => 'Running (Rung)',--}}
                                                   {{--'Cancelled' => 'Cancelled (CNCL)',--}}
                                                   {{--'Paused' => ' Paused (PSD)',--}}
                                                   {{--'Finished' => 'Finished (FNSH)',--}}

                                               {{--),Input::old('status'),['class'=>'form-control']) }}--}}
                                    {{--</div>--}}
                            	{{--</div>--}}
                            {{--</div>--}}

                            {{--<div style="width:50%; float:left; ">--}}
                                {{--<div class="col-sm-12 ">--}}
                                    {{--<div class='form-group'>--}}
                                               {{--{{ Form::label('degree_id', 'Degree with Program') }}--}}
                                               {{--{{ Form::select('degree_id',$dpg_list,null,['class'=>'form-control']) }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="clearfix visible-md-block"></div>--}}

                                {{--<div class="col-sm-12 ">--}}
                                    {{--<div class='form-group'>--}}
                                               {{--{{ Form::label('department_id', 'Department') }}--}}
                                               {{--{{ Form::select('department_id',$department_list,null,['class'=>'form-control']) }}--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="clearfix visible-md-block"></div>--}}

                                {{--<div class="col-sm-12 ">--}}
                                        {{--<div class='form-group'>--}}
                                              {{--{{ Form::label('year_id', 'Year') }}--}}
                                              {{--{{ Form::select('year_id',$year_list,null,['class'=>'form-control']) }}--}}
                                        {{--</div>--}}

                                {{--</div>--}}
                                {{--<div class="clearfix visible-sm-block">--}}

                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
           {{--</div>--}}
</div>

{{ Form::open(array('url' => 'admission/amw/batchDelete')) }}

        <table id="example" class="table table-striped  table-bordered"  >
            <thead>
                  {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
                  <br>

                <tr>
                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                    <th>Title</th>
                    <th>BN</th>
                    <th>Department</th>
                    <th>Year</th>
                    <th>Term</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($batch_management))
              @foreach($batch_management as $batch_list)
                <tr>

                   <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $batch_list->id }}"></td>
                   <td>{{ $batch_list->relDegree->title }}</td>
                    {{--<td>{{ $batch_list->relDegree->relDegreeProgram->code.''.$batch_list->relDegree->relDegreeGroup->code.' in '.$batch_list->relDegree->relDepartment->title }}</td>--}}
                   <td>{{ $batch_list->batch_number }}</td>
                   <td>{{ $batch_list->relDegree->relDepartment->title }}</td>
                   <td>{{ $batch_list->relYear->title }}</td>
                   <td>{{ $batch_list->relSemester->title }}</td>
                    <td>{{ $batch_list->status }}</td>

                   <td>
                         <a href="{{ URL::to('admission/amw/show/'.$batch_list->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                         <a class="btn btn-xs btn-default" href="{{ URL::to('admission/amw/edit/'.$batch_list->id) }}" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>

                         <a href="{{ URL::to('admission/amw/mng_adm_test_subject',['id'=>$batch_list->id ])  }}" class="btn btn-default btn-xs" >MATS</a>

                         <a href="{{ URL::route('admission.amw.batch-waiver.index',['id'=>$batch_list->id ])  }}" class="btn btn-default btn-xs" >MW</a>

                         <a href="{{ URL::route('admission.amw.batch-applicant.index',['id'=>$batch_list->id ])  }}" class="btn btn-default btn-xs" >MA</a>

                         <a href="{{ URL::to('admission/amw/batch-course',['id'=>$batch_list->id ])  }}" class="btn btn-default btn-xs" >BC</a>

                   </td>
                </tr>
               @endforeach
             @endif
            </tbody>
        </table>

        {{form::close() }}

<div class="text-right">
    {{ $batch_management->links() }}
</div>

<p>&nbsp;</p><p>&nbsp;</p>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

         </div>
        </div>
</div>


@stop