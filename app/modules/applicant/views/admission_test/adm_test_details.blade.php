
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Admission Test Details On</h4>
    {{--<h6 style="font-size: medium;color:steelblue;text-align: center"> {{$data->relDegree->relDegreeLevel->code.'  '.$data->relDegree->relDegreeGroup->code.' On '.$data->relDegree->relDegreeProgram->code}}-{{$data->relSemester->title}},{{$data->relYear->title}}</h6>--}}
    <h5 style="text-align: center;font-size: medium">Batch # {{$data->batch_number}}</h5>
</div>
<div class="modal-body">
    <div style="padding: 10px; width: 100%;">
        <table class="table table-bordered table-striped">
           <thead>
                <tr>
                   <th col width="200">Subject Name</th>
                   <th col width="150">Marks</th>
                   <th>Test Time Duration(in Minutes)</th>
                </tr>
           </thead>
           <tbody>
               @if(isset($adm_test_subject))
                  @foreach($adm_test_subject as $value)
                       <tr>
                              <td>{{$value->relAdmtestSubject->title}}</td>
                              <td>{{$value->marks}}</td>
                              <td>{{$value->duration}}</td>
                       </tr>
                  @endforeach
                  @endif
           </tbody>
         </table>
    </div>
    @include('applicant::admission_test.exm_center')
</div>
