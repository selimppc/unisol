<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"></h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">

                 <table class="table table-bordered table-striped">
                       <div class="col-lg-4">
                           @if(isset($applicant_acm_records))
                           {{ HTML::image('/applicant_images'.$applicant_acm_records->certificate) }}
                           @endif
                       </div>
                 </table>
           </div>
           <a href="" class="pull-right btn btn-xs btn-default" span class="glyphicon-refresh">Close</a>
     </div>
</div>
