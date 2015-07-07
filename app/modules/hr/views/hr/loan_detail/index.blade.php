<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Loan Detail </h3>
</div>

<div class="myForm" style="padding: 2%; width: 99%;">
    <div class="modal-body " >
        {{ Form::open(['route'=>'save-loan-detail']) }}
            @include('hr::hr.loan_detail._all_in_one_form')
        {{ Form::close() }}
    </div>
</div>

<style>
    .myForm{
       margin-left: 15px;
       margin-right: 15px;
    }

</style>



<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <div class="box box-solid ">
                <div class="col-sm-12">
                   <div class="pull-left col-sm-4"></h3>  </div>
                   <div class="pull-right col-sm-4" style="padding: 5px;">
                        <button type="button" class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#modal">
                          Add Loan Detail
                        </button>
                   </div>
                </div>

                {{ Form::open([ 'route'=>'batch-delete-loan-detail' ])}}
                   <div class="box-body">
                        <table id="example" class="table table-striped  table-bordered" >
                            <thead>
                                  {{ Form::submit('Delete Items', ['class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none', 'onclick'=> "return confirm('Are you sure you want to delete?')"])}}
                                <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Loan Head</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($model as $values)
                                 <tr>
                                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $values->id }}"></td>
                                    <td>{{ $values->relHrLoanHead->title }}</td>
                                    <td>{{ $values->amount }}</td>
                                    <td>{{ $values->date }}</td>

                                    <td>
                                        <a href="{{ URL::route('loan_detail.show', ['ld_id'=>$values->id ])  }}" class="btn btn-default btn-xs" title="Manage Applicant" data-toggle="modal" data-target="#modal-pc"><i style="color: #149bdf" class="fa fa-eye"></i></a>
                                        <a href="{{ URL::route('loan_detail.edit',['ld_id'=>$values->id])  }}" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal-pc"> <i style="color: #7b24dd" class="fa fa-edit"></i></a>
                                        <a data-href="{{ URL::route('loan_detail.destroy', ['ld_id'=>$values->id ]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i style="color: red" class="fa fa-trash-o" ></i></a>

                                    </td>

                                 </tr>
                                @endforeach
                            </tbody>
                        </table>
                   </div>
                {{form::close() }}

                {{Form::open(['route'=>'save-loan-detail', 'files'=>true])}}
                        @include('hr::hr.loan_detail._modal._modal')
                {{ Form::close() }}
                {{-- Modal Area --}}
                <div class="modal fade" id="modal-pc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                    </div>
                  </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>
