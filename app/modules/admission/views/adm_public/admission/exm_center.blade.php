<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Exam Center Choice Sequence</h4>
</div>

    {{--@include('admission::adm_public.admission.exm_center')--}}
 <div class="modal-body">
   <div style="padding: 20px;">
      <div class="row">
         {{ Form::open(['route' => ['admission.public.save-exm-center'], 'class'=>'form-horizontal','files' => true,]) }}
         {{ Form::hidden('batch_applicant_id',54 )}}
             <!-- Left col -->
             <section class="col-lg-12 connectedSortable">

             @if(isset($exm_center_choice))
                 @foreach($exm_center_choice as $value)
                    <input type="hidden" name="id[]" value="{{$value->id}}">
                     <div class="nav-tabs-custom" style="background:lavender">
                         <ul class="nav nav-tabs pull-right">
                             <li class="pull-left header" style="font-size: small"><i class="fa fa-arrows"></i><b>
                                <input type="hidden" name="exm_center_id[]" value="{{$value->exm_center_id}}"> {{ $value->relExmCenter->title }}
                             </b></li>
                         </ul>
                     </div><!-- /.nav-tabs-custom -->
                  @endforeach
             @else
                  @foreach(($exm_centers_all) as $values)
                      <input type="hidden" name="id[]" value="{{$value->id}}">
                       <div class="nav-tabs-custom" style="background:lavender">
                          <ul class="nav nav-tabs pull-right">
                            <li class="pull-left header" style="font-size: small"><i class="fa fa-arrows"></i><b>
                                <input type="hidden" name="exm_center_id[]" value="{{$values->exm_center_id}}"> {{ $values->title }}
                            </b></li>
                          </ul>
                       </div>
                  @endforeach
             @endif
             </section><!-- /.Left col -->
      {{ Form::submit('Save', array('class'=>'pull-right btn btn-sm btn-primary')) }}
      <a  href="" class="pull-right btn btn-sm btn-default" style="margin-right: 3px">Close</a>
      <small>for adding new exam center got to <a href="{{ URL::route('common.exm-center.create')}}"  >Add Exam Center</a></small>
      <p>&nbsp;</p>
      <p>&nbsp;</p>

      </div>
   </div>
 </div>

 <p>&nbsp;</p>
 <p>&nbsp;</p>
 {{Form::close()}}
