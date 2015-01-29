@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')




<div class="span8 well">
<table class="table table-striped table-bordered" id="myTable">

     <h4>Extra-Curricular Activities </h4>
                    <thead>


                        <tr><td>Applicant's name</td></tr>
                        <tr><td>Father's Name</td></tr>
                        <tr><td>Mother's Name</td></tr>
                        <tr><td>Father's occupation</td></tr>
                        <tr><td>Father's Phone</td></tr>
                        <tr><td>Freedom fighter</td></tr>
                        <tr><td>Mother's occupation</td></tr>
                        <tr><td>Mother's Phone</td></tr>
                        <tr><td>National_id</td></tr>
                        <tr><td>driving_license</td></tr>
                        <tr><td>passport</td></tr>
                        <tr><td>place_of_birth</td></tr>
                        <tr><td>marital_status</td></tr>
                        <tr><td>nationality</td></tr>
                        <tr><td>religion</td></tr>
                        <tr><td>signature</td></tr>
                        <tr><td>present_address</td></tr>
                        <tr><td>parmanent_address</td></tr>




                  </thead>

        <tbody>


     <br><br>
     {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#CreateModal">--}}
           {{--Edit--}}
     {{--</button>--}}

        </tbody>
    </table>

</div>










@stop