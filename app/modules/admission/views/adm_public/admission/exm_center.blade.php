{{ HTML::style('assets/etsb/etsb_css/bootstrap/bootstrap.min.css') }}

<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Exam Center Choice Sequence</h4>
</div>

 <div class="modal-body">
   <div style="padding: 20px;">
      <div class="row">
      {{ Form::open(['route' => ['admission.public.save-exm-center'], 'class'=>'form-horizontal','files' => true,]) }}

         {{ Form::hidden('batch_applicant_id', $ba_id )}}
             <!-- Left col -->
             <section class="col-lg-12 connectedSortable">
                @if(isset($exm_center_choice))
                  @foreach( $exm_center_choice as $values)
                    <input type="hidden" name="id[]" value="{{$values->id}}">
                     <div class="nav-tabs-custom" style="background:lavender">
                         <ul class="nav nav-tabs pull-right">
                             <li class="pull-left header" style="font-size: small"><i class="fa fa-arrows"></i><b>
                                <input type="hidden" name="exm_center_id[]" value="{{$values->exm_center_id}}"> {{ $values->relExmCenter->title }}
                             </b></li>
                         </ul>
                     </div><!-- /.nav-tabs-custom -->
                  @endforeach
                @else
                  @foreach(($exm_centers_all) as $values)
                      <div class="nav-tabs-custom" style="background:lavender">
                         <ul class="nav nav-tabs pull-right">
                           <li class="pull-left header" style="font-size: small"><i class="fa fa-arrows"></i><b>
                               <input type="hidden" name="exm_center_id[]" value="{{$values->id}}"> {{ $values->title }}
                           </b></li>
                         </ul>
                      </div>
                  @endforeach
                @endif
             </section><!-- /.Left col -->
      {{ Form::submit('Save', array('class'=>'pull-right btn btn-sm btn-primary')) }}
      <a  href="" class="pull-right btn btn-sm btn-default" style="margin-right: 3px">Close</a>

         <p>&nbsp;</p>
         <p>&nbsp;</p>
         {{Form::close()}}

      </div>
   </div>
 </div>


<!-- add js script -->
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/admin/dashboard.js')}}

