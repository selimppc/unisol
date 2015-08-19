@extends('layouts.layout')
@section('content')

    {{--<script>
        $(document).ready(function(){
            //$('#CreateModal').modal('show');
            $('#user-access').modal('show');
        });
    </script>--}}

             <div class="modal-dialog">
                 <div class="modal-content">
                     <div class="modal-header">
                         <span class="close_button" style="float: right">
                             <a href="{{URL::previous()}}" class="btn btn-info "> <span aria-hidden="true">&times;</span> </a>
                         </span>
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
                 </div><!-- /.modal-content -->
             </div><!-- /.modal-dialog -->


     <!-- User - Access Modal -->
     <div data-backdrop="static" data-keyboard="false" class="modal fade" id="user-access" tabindex="-1" role="dialog" aria-labelledby="addCategory" aria-hidden="false">
         <div class="modal-dialog">
             <div class="modal-content">
                 <div class="modal-header">
                     <span class="close_button" style="float: right">
                         <a href="{{URL::previous()}}" class="btn btn-info "> <span aria-hidden="true">&times;</span> </a>
                     </span>
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
             </div><!-- /.modal-content -->
         </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->

@stop