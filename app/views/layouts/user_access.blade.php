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
                    <button type="button" class="close" data-dismiss="modal">
                        <a href="{{URL::previous()}}" class="btn btn-info ">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        You are: <span style="font-weight: bold; color: #002a80;">
                                    {{isset(Auth::user()->get()->id) ? Auth::user()->get()->username : Auth::applicant()->get()->username}}
                                </span>
                    </h4>
                 </div>
                 <div class="modal-body">
                         <h3 style="color: #ad6704;">You are not authorized to perform this action! </h3>
                         <div>
                            {{HTML::image('img/forbidden/forbidden_anime.png')}}
                         </div>

                 </div>
                 <div class="modal-footer">
                     <a href="{{URL::previous()}}" class="btn btn-primary "> < Go Back </a>
                 </div>
            </div>
        </div>
     </div>

@stop