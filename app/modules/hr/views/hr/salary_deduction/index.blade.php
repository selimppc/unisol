<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Salary Deduction</h3>
</div>

<div class="myForm" style="padding: 2%; width: 99%;">
    <div class="modal-body " >
        {{ Form::open(['route'=>'store-salary-deduction']) }}
            @include('hr::hr.salary_deduction._all_in_one_form')
        {{ Form::close() }}
    </div>
</div>

<style>
    .myForm{
       margin-left: 15px;
       margin-right: 15px;
    }

</style>