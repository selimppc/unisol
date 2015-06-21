@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')

{{------------------ Data Table : Degree List starts  -----------------------------------------------------}}
<h3 class="box-title">Degree List</h3>

 <div class="box box-solid ">
     <div class="box-tools pull-right">

     </div>
     <div class="box box-info">
         <div class="box-body">
             <div class="row">
                 <div class="col-lg-12">
                      <div class="help-text-top">
                              <p>You can view all degree from this list and can select degree(s) to apply.Also you can see corresponding degree details information by individual link above degree name.</p>
                      </div>
                      {{ Form::open(['route' => ['admission.applicant.degree_apply']]) }}
                           <table class="table table-bordered table-striped">
                               <thead>
                                     <tr>
                                          <td class="col-lg-1"><input type="checkbox" id="checkbox" class="checkbox" value=""></td>
                                          <th class="col-lg-4" style="font-size: medium">Degree Name</th>
                                          <th style="font-size: medium">Batch Number</th>
                                          <th style="font-size: medium">Description</th>
                                     </tr>
                               </thead>
                               <tbody>
                                    @foreach($degreeList as $value)
                                         <tr>
                                             <td> <input type="checkbox" name="ids[]"  id="checkbox" class="myCheckbox" value="{{ $value->id }}" ></td>
                                             <td>
                                                 <a href="{{ URL::route('admission.public.degree_offer_details',
                                                 ['id' => $value->id]) }}" class="btn-link" title="Degree Details For Admission Test">
                                                 {{$value->relDegree->relDegreeLevel->code.'  '.$value->relDegree->relDegreeGroup->code.' In '.$value->relDegree->relDegreeProgram->code}} ,
                                                 {{ $value->relSemester->title }} ,{{ $value->relYear->title }}
                                                 </a>
                                             </td>
                                             <td>{{ $value->batch_number}}</td>
                                             <td>{{ $value->relDegree->description }}</td>
                                         </tr>
                                    @endforeach
                               </tbody>
                           </table>
                           <p>&nbsp;</p>
                      {{ Form::submit('Apply All', ['class'=>'pull-right btn btn-xs btn-info'])}}
                      {{ Form::close() }}
                 </div>
             </div>
         </div>
     </div>
 </div>

 <div class="text-right">
    {{ $degreeList->links() }}
 </div>

<p>&nbsp;</p>
<p>&nbsp;</p>

@stop

