<div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">

            <fieldset style="height: 100%; padding: 10px; width: 90%;">

                <div class="form-group">
                    {{ Form::label('name', 'name') }}
                    {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
               </div>
               <div class="form-group">
                                   {{ Form::label('name', 'name') }}
                                   {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                              </div>
                              <div class="form-group">
                                                  {{ Form::label('name', 'name') }}
                                                  {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                             </div>
                                             <div class="form-group">
                                                                 {{ Form::label('name', 'name') }}
                                                                 {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                                {{ Form::label('name', 'name') }}
                                                                                {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                           </div>
                                                                           <div class="form-group">
                                                                                               {{ Form::label('name', 'name') }}
                                                                                               {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                                          </div>
                                                                                          <div class="form-group">
                                                                                                              {{ Form::label('name', 'name') }}
                                                                                                              {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                                                         </div>
                                                                                                         <div class="form-group">
                                                                                                                             {{ Form::label('name', 'name') }}
                                                                                                                             {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                                                                        </div>
                                                                                                                        <div class="form-group">
                                                                                                                                            {{ Form::label('name', 'name') }}
                                                                                                                                            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                                                                                       </div>
                                                                                                                                       <div class="form-group">
                                                                                                                                                           {{ Form::label('name', 'name') }}
                                                                                                                                                           {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                                                                                                      </div>
                                                                                                                                                      <div class="form-group">
                                                                                                                                                                          {{ Form::label('name', 'name') }}
                                                                                                                                                                          {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
                                                                                                                                                                     </div>


               <div class="form-group">
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control datepicker','id'=>'datepicker')) }}
               </div>
               <div class="form-group">
                   {{ Form::label('deadline', 'Deadline') }}
                   {{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control datepicker','id'=>'datepicker1')) }}
              </div>

            </fieldset>
    </div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-primary">Save changes</button>
</div>



{{--<script>--}}
  {{--$(function() {--}}
    {{--$( "#datepicker" ).datepicker();--}}
     {{--$( "#datepicker1" ).datepicker();--}}
  {{--});--}}
{{--</script>--}}