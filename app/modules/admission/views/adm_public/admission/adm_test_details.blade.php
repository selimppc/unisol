@extends('layouts.master')
 @section('sidebar')
    {{--@include('applicant::_sidebar')--}}
 @stop
@section('content')


<section class="content">
  <div class="box-body">

    <h3>Admission Test Details On </h3>
    <p> <b style="font-style: italic">
        {{$adm_test_model->relDegree->title}},</b>
        {{$adm_test_model->relDegree->relSemester->title}},
        {{$adm_test_model->relDegree->relYear->title}}
    </p>

</div>
<div class="row">
   <div class="col-xs-12">

      <div class="box">
        <div class="box-header">

</div><!-- /.box-header -->

<br>

 {{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
 <table class="table table-bordered table-striped">

 {{--<col width="120">--}}
 {{--<col width="120">--}}
 {{--<col width="100">--}}
 {{----}}
 {{----}}

     <thead>
          <tr>
                <th>Subject Name</th>
                <th>Marks</th>
                <th>Test Time Duration(in mins)</th>
          </tr>
     </thead>
     <tbody>

           {{--@foreach($degree_model as $value)--}}
                <tr>
                   <td></td>
                   <td></td>
                   <td></td>

                </tr>
           {{--@endforeach--}}

     </tbody>
 </table>
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--</div><!-- /.box-body -->--}}
         </div><!-- /.box -->
     </div>
  </div>
</section>


@stop

