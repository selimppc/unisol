@extends('layouts.master')
 @section('sidebar')
    {{--@include('applicant::_sidebar')--}}
 @stop
@section('content')


<section class="content">
  <div class="box-body">

    <h3>Admission On </h3>

</div>
<div class="row">
   <div class="col-xs-12">

      <div class="box">
        <div class="box-header">

</div><!-- /.box-header -->

<br>

 {{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
 <div class="well well-sm">
      <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>

                   <th class="col-lg-4" > degree Name</th>

                </tr>
            </thead>

                   <tbody>
                      @foreach($degree_applicant as $value)
                            <tr>
                                <td>{{ $value->relDegree->title }}
                                   <a class="pull-right" href="{{ URL::to('public/admission/adm_test_details/'.$value->id)}}"><b>ATD</b></a>
                                </td>
                            </tr>
                      @endforeach
                   </tbody>
      </table>
 </div>
{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--</div><!-- /.box-body -->--}}
         </div><!-- /.box -->
     </div>
  </div>
</section>


@stop

