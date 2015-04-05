@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<h4> Admission Test Question Paper Evaluation</h4>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Evaluation System</h3>
    </div><!-- /.box-header -->
    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Subject </th>
                <th>Question Setter</th>
                <th>Question Evaluator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Trident</td>
                <td>Internet
                    Explorer 4.0</td>
                <td>Win 95+</td>
                <td> 4</td>
                <td>X</td>
            </tr>

            </tbody>
            <tfoot>
            <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
            </tr>
            </tfoot>
        </table>
    </div><!-- /.box-body -->
</div><!-- /.box -->

@stop