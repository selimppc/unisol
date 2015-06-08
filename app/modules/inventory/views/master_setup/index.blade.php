@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<div class="row">

    <div class="box box-solid ">
        <div class="pull-left col-sm-12">
            <h3> {{$pageTitle}} </h3>
        </div>

        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-blue" style="border-radius: 5px;">
                        <div style="text-align: center; padding-top: 5px;">
                            <h4>  Supplier Group </h4>
                        </div>
                        <a href="{{ URL::route('edit-stock-adjustment')}}" class="small-box-footer" data-toggle="modal" data-target="#modal-pc">
                            Click Here <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
            </div><!-- /.row -->

        </section><!-- /.content -->

    </div>
</div>

{{-- Modal Area --}}
<div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>



@stop