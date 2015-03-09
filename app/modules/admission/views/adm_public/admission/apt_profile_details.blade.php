@extends('layouts.master')
 @section('sidebar')

 @stop
@section('content')
<a class="pull-right btn btn-sm btn-info" href="{{ URL::to('degree_manage/create')}}" data-toggle="modal" data-target="#addModal" >Add More Degree</a>

<h3>Admission On </h3>
{{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
 <div class="well well-sm">
      <table class="table table-bordered table-striped">
            <thead>
                <tr></tr>
            </thead>

                   <tbody>
                             <tr>
                                  <th rowspan="100%" style="vertical-align: middle">
                                     <b style="font-size: medium">Degree Name</b>
                                  </th>
                             </tr>
                      @foreach($degree_applicant as $value)

                            <tr>
                                 <td>
                                       <a href="{{ URL::route('admission.adm_test_details',
                                           ['degree_id' => $value->id]) }}">
                                           {{ $value->relDegree->title }}
                                       </a>
                                 </td>
                            </tr>
                      @endforeach
                   </tbody>
      </table>
 </div>
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

@stop

