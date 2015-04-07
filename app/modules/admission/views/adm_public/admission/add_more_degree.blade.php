
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add More Degree </h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
           <div class="span9 well">
                 {{ Form::open(['route' => ['admission.public.degree_apply']]) }}
                      <table class="table table-bordered table-striped">
                          <thead>
                                <tr>
                                     <td></td>
                                     <th class="col-lg-7" style="font-size: medium">Degree Name</th>
                                     <th style="font-size: medium">Batch Number</th>
                                     <th style="font-size: medium">Description</th>
                                </tr>
                          </thead>

                             <tbody>
                                   @foreach($degreeList as $value)
                                         <tr>
                                                <td> <input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{ $value->id }}"></td>
                                                <td>
                                                        <a href="{{ URL::route('admission.degree_offer_details',
                                                        ['id' => $value->id]) }}">
                                                        {{ $value->relDegree->title }} Of {{$value->relDegree->relDegreeGroup->title}} On {{$value->relDegree->relDepartment->title}} ,
                                                        {{ $value->relSemester->title }} ,{{ $value->relYear->title }}
                                                        </a>
                                                </td>
                                                <td>{{ $value->batch_number}}</td>
                                                <td>{{ $value->relDegree->description }}</td>
                                         </tr>
                                   @endforeach
                             </tbody>
                      </table>
                      {{ Form::submit('Apply', array('class'=>'pull-right btn btn-xs btn-info'))}}
                      <p>&nbsp;</p>
                      {{ Form::close() }}
           </div>
           <a href="" class="pull-right btn btn-xs btn-default" span class="glyphicon-refresh">Close</a>
     </div>
</div>
