
 <div class="modal-body">
   <div style="padding: 20px;">
      <div class="row">

         {{ Form::hidden('batch_applicant_id', 1 )}}
             <!-- Left col -->
             <section class="col-lg-12 connectedSortable">
                 @foreach(($exm_center_choice_lists) as $value)
                     <div class="nav-tabs-custom" style="background: powderblue">
                         <ul class="nav nav-tabs pull-right">
                             <li class="pull-left header" style="font-size: small"><i class="fa fa-arrows"></i><b> {{ $value->relExmCenter->title }}</b></li>
                         </ul>
                     </div><!-- /.nav-tabs-custom -->
                  @endforeach
             </section><!-- /.Left col -->
         <p>&nbsp;</p>
         <p>&nbsp;</p>

      </div>
   </div>
 </div>
