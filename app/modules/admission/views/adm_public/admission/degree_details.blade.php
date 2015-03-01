@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


<section class="content">
<div class="box-body">



</div>
<div class="row">
<div class="col-xs-12">

<div class="box">
<div class="box-header">

</div><!-- /.box-header -->
{{--<div class="box-body table-responsive">--}}

<br>



 <h3>Degree Details</h3>
    {{---------------------------------------------Data Table: Starts-----------------------------------------------------------------}}
<div class="well well-sm">

             <table id="example1" class="table table-bordered table-striped">

                         <tr>
                                <th> Degree  :</th>
                                <td>{{ $degree_model->title }}</td>
                         </tr>

                         <tr>
                                 <th> Year:</th>
                                 <td>{{ $degree_model->relYear->title }}</td>
                         </tr>

                         <tr>
                                 <th> Semester:</th>
                                 <td>{{ $degree_model->relSemester->title }}</td>

                         </tr>

                         <tr>
                                 <th> Description  :</th>
                                 <td>{{ $degree_model->description }}</td>
                         </tr>
                         <tr>
                                <th> Waiver:</th>
                                <td>{{ $degree_model->relDegreeWaiver->relWaiver->title }}</td>

                         </tr>

                         <tr>
                                 <th>Duration:</th>
                                 <td>{{ $degree_model->duration }}</td>

                         </tr>

                         <tr>
                                 <th>Total Credit :</th>
                                 <td>{{ $degree_model->total_credit }}</td>

                         </tr>

                         <tr>
                                 <th>Major Courses :</th>
                                 <td>{{ $degree_model->major_minor }}</td>

                         </tr>



             </table>

</div>

{{-----------------------------------Data Table : Ends---------------------------------------------------------------------------}}

{{--------Pagination Link--------------------------}}
<div class="pull-right paginate-button">
    {{--{{$model->links()}}--}}
</div>


{{--</div><!-- /.box-body -->--}}
</div><!-- /.box -->
</div>
</div>
</section>

{{---------------------------------------------------Modals-----------------------------------------------}}

@stop

