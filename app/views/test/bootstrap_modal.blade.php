@extends('layouts.master')


@section('content')

    <script>
        $(document).ready(function(){
            //$('#CreateModal').modal('show');
            $('#alertModal').modal('show');
        });
    </script>

    <!-- Modal for Create -->
     <div data-backdrop="static" data-keyboard="false" class="modal fade" id="alertModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Create Course</h4>
                         </div>
                         <div class="modal-body">
                                 Hello !

                         </div>
                         <div class="modal-footer">
                         </div>
                    </div>
                </div>
     </div>

@stop