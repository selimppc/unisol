
 <div class="modal-body">
   <div style="padding: 20px;">
      <div class="row">

         {{ Form::hidden('batch_applicant_id',54 )}}
             <!-- Left col -->
             <section class="col-lg-12 connectedSortable">
                 @foreach(($exm_center_choice_lists) as $value)
                    <input type="hidden" name="id[]" value="{{$value->id}}">
                     <div class="nav-tabs-custom" style="background:lavender">
                         <ul class="nav nav-tabs pull-right">
                             <li class="pull-left header" style="font-size: small"><i class="fa fa-arrows"></i><b>
                                <input type="hidden" name="exm_center_id[]" value="{{$value->exm_center_id}}"> {{ $value->relExmCenter->title }}
                             </b></li>
                         </ul>
                     </div><!-- /.nav-tabs-custom -->
                  @endforeach
             </section><!-- /.Left col -->
      {{ Form::submit('Save', array('class'=>'pull-right btn btn-sm btn-primary')) }}
      <a  href="" class="pull-right btn btn-sm btn-default" style="margin-right: 3px">Close</a>

         <p>&nbsp;</p>
         <p>&nbsp;</p>

      </div>
   </div>
 </div>
