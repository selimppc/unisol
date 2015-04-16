@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop

@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.amw.admission-test-home')}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>

 <h3>Manage Examiner for Admission Test  </h3>
 {{ Form::open(array('route' => 'admission.amw.admission-test-examiner.delete-adm-test-examiner')) }}

<div class="row">
<div class="box box-solid ">
<div class="box-body">
    <div class="row">
       <div class="col-sm-12">
            <div class="col-sm-6">

                    <strong> Year: </strong> {{ $degree_batch->relYear->title }}
                    </br>
                    <strong> Semester: </strong> {{ $degree_batch->relSemester->title }}
                    </br>
                    <strong> Degree: </strong> {{ $degree_batch->relDegree->relDegreeLevel->code.'  '.$degree_batch->relDegree->relDegreeGroup->code.' In '.$degree_batch->relDegree->relDegreeProgram->code
 }}
                    </br>
                    {{--<strong> Department: </strong> {{ $degree_batch->relDegree->relDepartment->title }}--}}
                    </br>

            </div>
           <div class="pull-right col-sm-6">
               <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('admission/amw/admission-test-examiner/add-admission-test-examiner',['year_id'=>$degree_batch->year_id, 'semester_id'=>$degree_batch->semester_id,'batch_id'=>$degree_batch->id])}}" data-toggle="modal" data-target="#modal" >Add Examiner</a>
           </div>
       </div>
    </div>


        <table id="example" class="table table-striped  table-bordered"  >
              <thead>
                   {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                     <br>
                     <tr>
                        <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                        <th>Name of Examiner</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
          </thead>
          <tbody>

              @foreach($adm_test_examiner as $values)
                    <tr>
                        <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $values->id }}"></td>
                        {{Form::hidden('batch_id', $values->batch_id)}}

                         <td>
                         <b>{{ HTML::linkAction('AdmAmwController@viewAdmTestExaminers',User::FullName($values->user_id),['id'=>$values->batch_id], ['data-toggle'=>"modal", 'data-target'=>"#modal"]) }}</b>

                         </td>

                         <td>{{ $values->status }} </td>

                        <td>
                            @if($values->status != 'cancel')
                              <a href="{{URL::route('admission.amw.admission-test-examiner.change-status-by-test-examiner', ['id'=>$values->id])}}" class="btn btn-info btn-xs">Cancel</a>
                            @endif
                        </td>
                    </tr>
              @endforeach
          </tbody>
        </table>
    {{form::close() }}


            {{ $adm_test_examiner->links() }}

</div>
</div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
        </div>
</div>


@stop
