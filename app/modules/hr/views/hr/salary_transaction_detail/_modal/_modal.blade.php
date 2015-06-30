<!-- Add Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="z-index:1050">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Salary Transaction Detail <strong style="color: #002a80">
{{--        {{ $emp_name->relHrEmployee->relUser->relUserProfile->first_name .' '.$emp_name->relHrEmployee->relUser->relUserProfile->middle_name.' '.$emp_name->relHrEmployee->relUser->relUserProfile->last_name }}--}}
        </strong></h4>

      </div>
      <div class="modal-body">
        @include('hr::hr.salary_transaction_detail._form')
      </div>
    </div>
  </div>
</div>

{{-- Modal for delete --}}
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
            </div>
            <div class="modal-body">
                <strong>Are you sure to delete?</strong>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger danger">Delete</a>

            </div>
        </div>
    </div>
</div>