@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <!-- START CUSTOM TABS -->
    <h2 class="page-header text-purple tab-text-margin">Applicant Dashboard</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">

                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal : edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>


@stop



