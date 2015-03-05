@extends('layouts.master')
 @section('sidebar')

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

     <thead>
             <tr>
                    <th>Subject Name</th>
                    <th>Marks</th>
                    <th>Test Time Duration(in Minutes)</th>
             </tr>
     </thead>
           <tbody>

                   @foreach($adm_test_subject as $value)
                        <tr>
                               <td>{{$value->relAdmTestSubject->title}}</td>
                               <td>{{$value->marks}}</td>
                               <td>{{$value->duration}}</td>
                        </tr>
                   @endforeach
           </tbody>
 </table>
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

         </div><!-- /.box -->
     </div>
  </div>
</section>


@stop

